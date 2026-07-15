<div
    id="vantroz-chatbot"
    class="vtz-chatbot"
    x-data="vantrozChatbot({
        bootstrapUrl: @js(route('chatbot.bootstrap')),
        messageUrl: @js(route('chatbot.message')),
        leadUrl: @js(route('chatbot.lead')),
        csrf: @js(csrf_token()),
        companyName: @js(config('company.name')),
    })"
    x-cloak
>
    <button
        type="button"
        class="vtz-chatbot-launcher"
        @click="toggle()"
        :aria-expanded="open.toString()"
        aria-controls="vtz-chatbot-panel"
        :aria-label="open ? 'Close chat' : 'Open chat assistant'"
    >
        <svg x-show="!open" class="vtz-chatbot-launcher-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.86 9.86 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
        </svg>
        <svg x-show="open" class="vtz-chatbot-launcher-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
        <span class="vtz-chatbot-launcher-pulse" x-show="!open" aria-hidden="true"></span>
    </button>

    <div
        id="vtz-chatbot-panel"
        class="vtz-chatbot-panel"
        x-show="open"
        x-transition:enter="vtz-chat-enter"
        x-transition:enter-start="vtz-chat-enter-start"
        x-transition:enter-end="vtz-chat-enter-end"
        x-transition:leave="vtz-chat-leave"
        x-transition:leave-start="vtz-chat-leave-start"
        x-transition:leave-end="vtz-chat-leave-end"
        role="dialog"
        aria-label="{{ config('company.name') }} chat assistant"
        @keydown.escape.window="open && close()"
    >
        <header class="vtz-chatbot-header">
            <div class="vtz-chatbot-header-text">
                <p class="vtz-chatbot-eyebrow">{{ config('company.name') }} Assistant</p>
                <h2 class="vtz-chatbot-title">How can we help?</h2>
            </div>
            <button type="button" class="vtz-chatbot-close" @click="close()" aria-label="Close chat">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </header>

        <div class="vtz-chatbot-messages" x-ref="messages">
            <template x-for="(item, index) in messages" :key="index">
                <div class="vtz-chatbot-row" :class="item.role === 'user' ? 'is-user' : 'is-bot'">
                    <div class="vtz-chatbot-bubble" x-text="item.text"></div>
                    <div class="vtz-chatbot-links" x-show="item.links && item.links.length">
                        <template x-for="(link, li) in (item.links || [])" :key="li">
                            <a class="vtz-chatbot-link" :href="link.url" x-text="link.label"></a>
                        </template>
                    </div>
                </div>
            </template>
            <div class="vtz-chatbot-row is-bot" x-show="busy">
                <div class="vtz-chatbot-bubble vtz-chatbot-typing">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>

        <div class="vtz-chatbot-chips" x-show="quickReplies.length && !busy">
            <template x-for="chip in quickReplies" :key="chip.id">
                <button type="button" class="vtz-chatbot-chip" @click="sendChip(chip)" x-text="chip.label"></button>
            </template>
        </div>

        <form class="vtz-chatbot-form" @submit.prevent="sendMessage()">
            <label class="vtz-chatbot-honeypot" aria-hidden="true">
                <input type="text" name="website" tabindex="-1" autocomplete="off" x-model="honeypot">
            </label>
            <input
                type="text"
                class="vtz-chatbot-input"
                placeholder="Ask about services, packages, tech…"
                x-model="draft"
                :disabled="busy"
                maxlength="2000"
                autocomplete="off"
            >
            <button type="submit" class="vtz-chatbot-send" :disabled="busy || !draft.trim()" aria-label="Send message">
                <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                </svg>
            </button>
        </form>
    </div>
</div>
