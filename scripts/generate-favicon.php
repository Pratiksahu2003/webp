<?php

/**
 * Generate raster favicon assets from the VanTroZ brand mark.
 */

declare(strict_types=1);

$sizes = [
    'favicon-16x16.png' => 16,
    'favicon-32x32.png' => 32,
    'favicon-48x48.png' => 48,
    'apple-touch-icon.png' => 180,
    'android-chrome-192x192.png' => 192,
    'android-chrome-512x512.png' => 512,
];

$outputDir = dirname(__DIR__) . '/public';

function allocateColor(GdImage $canvas, int $r, int $g, int $b): int
{
    return imagecolorallocate($canvas, $r, $g, $b);
}

function drawFavicon(int $size): GdImage
{
    $canvas = imagecreatetruecolor($size, $size);
    imagealphablending($canvas, true);
    imagesavealpha($canvas, true);

    $transparent = imagecolorallocatealpha($canvas, 0, 0, 0, 127);
    imagefill($canvas, 0, 0, $transparent);

    $bgTop = allocateColor($canvas, 255, 255, 255);
    $orangeTop = allocateColor($canvas, 251, 146, 60);
    $orangeBottom = allocateColor($canvas, 234, 88, 12);
    $white = allocateColor($canvas, 255, 255, 255);

    $radius = (int) round($size * 0.219);
    drawRoundedRect($canvas, 0, 0, $size - 1, $size - 1, $radius, $bgTop);

    for ($y = 0; $y < $size; $y++) {
        $ratio = $y / max(1, $size - 1);
        $r = (int) (255 + ($ratio * (248 - 255)));
        $g = (int) (255 + ($ratio * (250 - 255)));
        $b = (int) (255 + ($ratio * (252 - 255)));
        $lineColor = imagecolorallocate($canvas, $r, $g, $b);
        imageline($canvas, 0, $y, $size - 1, $y, $lineColor);
    }

    $pillX = (int) round($size * 0.188);
    $pillY = (int) round($size * 0.344);
    $pillW = (int) round($size * 0.625);
    $pillH = (int) round($size * 0.313);
    $pillRadius = (int) round($pillH / 2);

    drawGradientRoundedRect($canvas, $pillX, $pillY, $pillX + $pillW, $pillY + $pillH, $pillRadius, $orangeTop, $orangeBottom);

    $innerX = (int) round($size * 0.25);
    $innerY = (int) round($size * 0.406);
    $innerW = (int) round($size * 0.5);
    $innerH = (int) round($size * 0.188);
    $innerRadius = (int) round($innerH / 2);

    drawRoundedRect($canvas, $innerX, $innerY, $innerX + $innerW, $innerY + $innerH, $innerRadius, $white);

    return $canvas;
}

function drawRoundedRect(GdImage $canvas, int $x1, int $y1, int $x2, int $y2, int $radius, int $color): void
{
    $radius = max(1, min($radius, (int) floor(min($x2 - $x1, $y2 - $y1) / 2)));
    imagefilledrectangle($canvas, $x1 + $radius, $y1, $x2 - $radius, $y2, $color);
    imagefilledrectangle($canvas, $x1, $y1 + $radius, $x2, $y2 - $radius, $color);
    imagefilledellipse($canvas, $x1 + $radius, $y1 + $radius, $radius * 2, $radius * 2, $color);
    imagefilledellipse($canvas, $x2 - $radius, $y1 + $radius, $radius * 2, $radius * 2, $color);
    imagefilledellipse($canvas, $x1 + $radius, $y2 - $radius, $radius * 2, $radius * 2, $color);
    imagefilledellipse($canvas, $x2 - $radius, $y2 - $radius, $radius * 2, $radius * 2, $color);
}

function drawGradientRoundedRect(GdImage $canvas, int $x1, int $y1, int $x2, int $y2, int $radius, int $topColor, int $bottomColor): void
{
    $topRgb = imagecolorsforindex($canvas, $topColor);
    $bottomRgb = imagecolorsforindex($canvas, $bottomColor);

    for ($y = $y1; $y <= $y2; $y++) {
        $ratio = ($y - $y1) / max(1, $y2 - $y1);
        $r = (int) ($topRgb['red'] + ($bottomRgb['red'] - $topRgb['red']) * $ratio);
        $g = (int) ($topRgb['green'] + ($bottomRgb['green'] - $topRgb['green']) * $ratio);
        $b = (int) ($topRgb['blue'] + ($bottomRgb['blue'] - $topRgb['blue']) * $ratio);
        $lineColor = imagecolorallocate($canvas, $r, $g, $b);

        $left = $x1;
        $right = $x2;

        if ($y < $y1 + $radius) {
            $dy = $y1 + $radius - $y;
            $dx = (int) sqrt(max(0, ($radius * $radius) - ($dy * $dy)));
            $left = max($x1, $x1 + $radius - $dx);
            $right = min($x2, $x2 - $radius + $dx);
        } elseif ($y > $y2 - $radius) {
            $dy = $y - ($y2 - $radius);
            $dx = (int) sqrt(max(0, ($radius * $radius) - ($dy * $dy)));
            $left = max($x1, $x1 + $radius - $dx);
            $right = min($x2, $x2 - $radius + $dx);
        }

        imageline($canvas, $left, $y, $right, $y, $lineColor);
    }
}

function writeIco(string $path, array $pngPaths): void
{
    $images = [];

    foreach ($pngPaths as $pngPath) {
        $data = file_get_contents($pngPath);
        if ($data === false) {
            throw new RuntimeException("Unable to read PNG: {$pngPath}");
        }

        $images[] = $data;
    }

    $count = count($images);
    $offset = 6 + ($count * 16);
    $bytes = pack('vvv', 0, 1, $count);

    foreach ($images as $index => $data) {
        $size = getimagesizefromstring($data);
        $width = $size[0] >= 256 ? 0 : $size[0];
        $height = $size[1] >= 256 ? 0 : $size[1];
        $bytes .= pack('CCCCvvVV', $width, $height, 0, 0, 1, 32, strlen($data), $offset);
        $offset += strlen($data);
    }

    foreach ($images as $data) {
        $bytes .= $data;
    }

    file_put_contents($path, $bytes);
}

foreach ($sizes as $filename => $size) {
    $canvas = drawFavicon($size);
    $path = $outputDir . '/' . $filename;
    imagepng($canvas, $path, 9);
    imagedestroy($canvas);
    echo "Created {$filename} ({$size}x{$size})\n";
}

writeIco(
    $outputDir . '/favicon.ico',
    [
        $outputDir . '/favicon-16x16.png',
        $outputDir . '/favicon-32x32.png',
        $outputDir . '/favicon-48x48.png',
    ]
);

echo "Created favicon.ico\n";
