<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $blogPostId = $this->route('blog_post') ? $this->route('blog_post')->id : null;
        
        return [
            // Basic Fields
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blog_posts,slug,' . $blogPostId,
            'excerpt' => 'nullable|string|max:500',
            'content' => 'required|string',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'og_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'twitter_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string',
            'author' => 'nullable|string|max:100',
            'status' => 'required|in:draft,published,scheduled',
            'published_at' => 'nullable|date',
            'scheduled_at' => 'nullable|date|after:now',
            'is_published' => 'boolean',
            'allow_comments' => 'boolean',
            'is_featured' => 'boolean',
            'sort_order' => 'nullable|integer|min:0',
            
            // SEO Fields
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:320',
            'meta_keywords' => 'nullable|string',
            'canonical_url' => 'nullable|url|max:255',
            
            // Open Graph Fields
            'og_title' => 'nullable|string|max:255',
            'og_description' => 'nullable|string|max:320',
            'og_image' => 'nullable|string|max:255',
            'og_type' => 'nullable|string|in:article,website',
            
            // Twitter Card Fields
            'twitter_card' => 'nullable|string|in:summary,summary_large_image,app,player',
            'twitter_title' => 'nullable|string|max:255',
            'twitter_description' => 'nullable|string|max:320',
            'twitter_image' => 'nullable|string|max:255',
            
            // Focus Keywords
            'focus_keywords' => 'nullable|string',
        ];
    }

    /**
     * Get custom validation messages.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'The blog post title is required.',
            'title.max' => 'The title must not exceed 255 characters.',
            'content.required' => 'The blog post content is required.',
            'slug.unique' => 'This slug is already taken. Please choose a different one.',
            'meta_title.max' => 'Meta title should not exceed 255 characters for optimal SEO.',
            'meta_description.max' => 'Meta description should not exceed 320 characters for optimal SEO.',
            'scheduled_at.after' => 'Scheduled date must be in the future.',
            'og_title.max' => 'Open Graph title should not exceed 255 characters.',
            'og_description.max' => 'Open Graph description should not exceed 320 characters.',
            'twitter_title.max' => 'Twitter title should not exceed 255 characters.',
            'twitter_description.max' => 'Twitter description should not exceed 320 characters.',
        ];
    }

    /**
     * Get custom attribute names for validation errors.
     */
    public function attributes(): array
    {
        return [
            'meta_title' => 'SEO title',
            'meta_description' => 'SEO description',
            'meta_keywords' => 'SEO keywords',
            'og_title' => 'Open Graph title',
            'og_description' => 'Open Graph description',
            'og_image' => 'Open Graph image',
            'twitter_title' => 'Twitter title',
            'twitter_description' => 'Twitter description',
            'twitter_image' => 'Twitter image',
            'focus_keywords' => 'focus keywords',
        ];
    }

    /**
     * Configure the validator instance.
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            // Custom validation: Check if scheduled_at is required when status is scheduled
            if ($this->status === 'scheduled' && !$this->scheduled_at) {
                $validator->errors()->add('scheduled_at', 'Scheduled date is required when status is set to scheduled.');
            }

            // Custom validation: SEO recommendations
            if ($this->meta_title && strlen($this->meta_title) > 60) {
                $validator->errors()->add('meta_title', 'Meta title should be 60 characters or less for optimal SEO.');
            }

            if ($this->meta_description && (strlen($this->meta_description) < 120 || strlen($this->meta_description) > 160)) {
                $validator->errors()->add('meta_description', 'Meta description should be between 120-160 characters for optimal SEO.');
            }

            // Validate slug format
            if ($this->slug && !preg_match('/^[a-z0-9-]+$/', $this->slug)) {
                $validator->errors()->add('slug', 'Slug can only contain lowercase letters, numbers, and hyphens.');
            }
        });
    }
}
