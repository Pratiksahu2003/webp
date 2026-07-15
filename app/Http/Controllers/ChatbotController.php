<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatbotLeadRequest;
use App\Http\Requests\ChatbotMessageRequest;
use App\Models\ContactLead;
use App\Services\Chatbot\ChatbotReplyService;
use Illuminate\Http\JsonResponse;

class ChatbotController extends Controller
{
    public function __construct(
        protected ChatbotReplyService $replies,
    ) {}

    public function bootstrap(): JsonResponse
    {
        return response()->json($this->replies->bootstrap());
    }

    public function message(ChatbotMessageRequest $request): JsonResponse
    {
        if ($request->filled('website')) {
            return response()->json([
                'reply' => 'Thanks! How else can I help?',
                'links' => [],
                'quick_replies' => [],
                'lead' => $this->replies->normalizeLeadState([]),
                'submit_lead' => false,
            ]);
        }

        $result = $this->replies->reply(
            (string) $request->validated('message'),
            $request->validated('lead') ?? [],
        );

        return response()->json($result);
    }

    public function lead(ChatbotLeadRequest $request): JsonResponse
    {
        if ($request->filled('website')) {
            return response()->json([
                'ok' => true,
                'message' => 'Thank you! Our team will contact you shortly.',
            ]);
        }

        $userMessage = trim((string) ($request->validated('message') ?? ''));
        $service = $request->validated('service');
        $serviceLabel = $service ? (ContactLead::SERVICES[$service] ?? $service) : null;

        $composed = '[Chatbot lead]';
        if ($serviceLabel) {
            $composed .= ' Service: '.$serviceLabel.'.';
        }
        if ($userMessage !== '') {
            $composed .= ' '.$userMessage;
        }

        ContactLead::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'company' => $request->validated('company'),
            'phone' => $request->validated('phone'),
            'service' => $service,
            'budget' => null,
            'message' => $composed,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'new',
        ]);

        return response()->json([
            'ok' => true,
            'message' => 'Thanks! Your details were sent to our team. We will get back to you soon.',
        ]);
    }
}
