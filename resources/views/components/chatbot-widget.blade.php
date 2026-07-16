<div
    id="vantroz-chatbot"
    class="vtz-chatbot"
    x-data="vantrozChatbot({
        bootstrapUrl: @js(route('chatbot.bootstrap')),
        messageUrl: @js(route('chatbot.message')),
        leadUrl: @js(route('chatbot.lead')),
        csrf: @js(csrf_token()),
        companyName: @js('Vantroz'),
        logoUrl: @js(asset('favicon.svg')),
    })"
    x-cloak
>
    {{-- Floating launcher --}}
    <button
        type="button"
        class="vtz-chatbot-launcher"
        @click="toggle()"
        :aria-expanded="open.toString()"
        aria-controls="vtz-chatbot-panel"
        :aria-label="open ? 'Close chat' : 'Open Vantroz assistant'"
    >
        <span class="vtz-chatbot-launcher-inner">
            <svg x-show="!open" class="vtz-chatbot-launcher-icon" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-3 9H7V9h10v2zm0-3H7V6h10v2z"/>
            </svg>
            <svg x-show="open" x-cloak class="vtz-chatbot-launcher-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </span>
        <span class="vtz-chatbot-launcher-pulse" x-show="!open" aria-hidden="true"></span>
        <span class="vtz-chatbot-launcher-badge" x-show="!open && showBadge" x-text="badgeCount" aria-hidden="true"></span>
    </button>

    {{-- Panel --}}
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
        aria-modal="true"
        aria-label="Vantroz chat assistant"
        @keydown.escape.window="open && close()"
    >
        <header class="vtz-chatbot-header">
            <div class="vtz-chatbot-brand">
                <div class="vtz-chatbot-avatar" aria-hidden="true">
                    <img
                        src="{{ asset('favicon.svg') }}"
                        alt=""
                        class="vtz-chatbot-avatar-img"
                        width="40"
                        height="40"
                        onerror="this.onerror=null;this.src='{{ asset('favicon-32x32.png') }}';"
                    >
                </div>
                <div class="vtz-chatbot-header-text">
                    <h2 class="vtz-chatbot-title">Vantroz Assistant</h2>
                    <p class="vtz-chatbot-status">
                        <span class="vtz-chatbot-status-dot"></span>
                        Online · replies instantly
                    </p>
                </div>
            </div>
            <div class="vtz-chatbot-header-actions">
                <button type="button" class="vtz-chatbot-icon-btn" @click="resetChat()" aria-label="Start new chat" title="New chat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                </button>
                <button type="button" class="vtz-chatbot-icon-btn" @click="close()" aria-label="Close chat">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.25" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="vtz-chatbot-header-accent" aria-hidden="true"></div>
        </header>

        <div class="vtz-chatbot-messages" x-ref="messages">
            <div class="vtz-chatbot-intro" x-show="messages.length <= 1 && !busy">
                <p class="vtz-chatbot-intro-title">Ask anything about Vantroz</p>
                <p class="vtz-chatbot-intro-text">Services, packages, tech stack, blog insights — or get a quote in under a minute.</p>
            </div>

            <template x-for="(item, index) in messages" :key="index">
                <div class="vtz-chatbot-row" :class="item.role === 'user' ? 'is-user' : 'is-bot'">
                    <div class="vtz-chatbot-meta" x-show="item.role === 'bot'">
                        <span class="vtz-chatbot-meta-avatar" aria-hidden="true">V</span>
                        <span class="vtz-chatbot-meta-name">Vantroz Bot</span>
                    </div>
                    <div class="vtz-chatbot-bubble" x-text="item.text"></div>
                    <div class="vtz-chatbot-links" x-show="item.links && item.links.length">
                        <template x-for="(link, li) in (item.links || [])" :key="li">
                            <a
                                class="vtz-chatbot-link"
                                :href="link.url"
                                target="_blank"
                                rel="noopener noreferrer"
                                @click.stop
                            >
                                <span class="vtz-chatbot-link-label" x-text="link.label"></span>
                                <svg class="vtz-chatbot-link-icon" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z"/>
                                    <path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z"/>
                                </svg>
                            </a>
                        </template>
                    </div>
                </div>
            </template>

            <div class="vtz-chatbot-row is-bot" x-show="busy">
                <div class="vtz-chatbot-meta">
                    <span class="vtz-chatbot-meta-avatar" aria-hidden="true">V</span>
                    <span class="vtz-chatbot-meta-name">Typing…</span>
                </div>
                <div class="vtz-chatbot-bubble vtz-chatbot-typing">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </div>

        <div class="vtz-chatbot-suggestions" x-show="quickReplies.length && !busy">
            <p class="vtz-chatbot-suggestions-label">Quick actions</p>
            <div class="vtz-chatbot-chips">
                <template x-for="chip in quickReplies" :key="chip.id">
                    <button
                        type="button"
                        class="vtz-chatbot-chip"
                        :class="chipClass(chip)"
                        @click="sendChip(chip)"
                    >
                        <span class="vtz-chatbot-chip-icon" x-text="chipIcon(chip)" aria-hidden="true"></span>
                        <span x-text="chip.label"></span>
                    </button>
                </template>
            </div>
        </div>

        <form class="vtz-chatbot-form" @submit.prevent="sendMessage()">
            <label class="vtz-chatbot-honeypot" aria-hidden="true">
                <input type="text" name="website" tabindex="-1" autocomplete="off" x-model="honeypot">
            </label>
            <div class="vtz-chatbot-composer">
                <input
                    type="text"
                    class="vtz-chatbot-input"
                    placeholder="Ask about services, packages, tech…"
                    x-model="draft"
                    :disabled="busy"
                    maxlength="2000"
                    autocomplete="off"
                    x-ref="composer"
                >
                <button type="submit" class="vtz-chatbot-send" :disabled="busy || !draft.trim()" aria-label="Send message">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                        <path d="M3.4 20.4l17.45-7.48a1 1 0 000-1.84L3.4 3.6a.993.993 0 00-1.39.91L2 9.12c0 .5.37.93.87.99L17 12 2.87 13.88c-.5.07-.87.5-.87.99l.01 4.61c0 .72.73 1.2 1.39.92z"/>
                    </svg>
                </button>
            </div>
            <p class="vtz-chatbot-footnote">Knowledge from live services · packages · tech · blog</p>
        </form>
    </div>
</div>
