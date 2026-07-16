/**
 * VanTroZ website knowledge chatbot (Alpine component).
 */
document.addEventListener('alpine:init', () => {
    Alpine.data('vantrozChatbot', (config) => ({
        open: false,
        busy: false,
        draft: '',
        honeypot: '',
        messages: [],
        quickReplies: [],
        lead: {
            step: null,
            name: null,
            email: null,
            phone: null,
            service: null,
            message: null,
        },
        serviceOptions: [],
        companyName: config.companyName || 'Vantroz',
        booted: false,
        showBadge: true,
        badgeCount: 1,

        async init() {
            this.bootstrap().catch(() => {});
        },

        chipIcon(chip) {
            const id = String(chip?.id || '');
            if (id === 'quote' || id.startsWith('service:')) return '✦';
            if (id === 'services') return '▣';
            if (id === 'packages') return '◈';
            if (id === 'technologies') return '⚙';
            if (id === 'blog') return '✎';
            if (id === 'contact') return '☎';
            if (id === 'cancel') return '✕';
            if (id === 'skip') return '→';
            return '•';
        },

        chipClass(chip) {
            const id = String(chip?.id || '');
            if (id === 'quote') return 'is-accent';
            if (id === 'cancel' || id === 'skip') return 'is-muted';
            return '';
        },

        async bootstrap() {
            if (this.booted) {
                return;
            }

            const response = await fetch(config.bootstrapUrl, {
                headers: {
                    Accept: 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
            });

            if (!response.ok) {
                throw new Error('Chatbot bootstrap failed');
            }

            const data = await response.json();
            this.quickReplies = data.quick_replies || [];
            this.serviceOptions = data.service_options || [];
            this.companyName = 'Vantroz';

            if (this.messages.length === 0 && data.welcome) {
                this.messages.push({
                    role: 'bot',
                    text: data.welcome,
                    links: [],
                });
            }

            this.booted = true;
        },

        async toggle() {
            this.open = !this.open;
            if (this.open) {
                this.showBadge = false;
                await this.bootstrap().catch(() => {
                    if (this.messages.length === 0) {
                        this.messages.push({
                            role: 'bot',
                            text: 'Hi! Ask me about our services, packages, technologies, or blog — or request a quote.',
                            links: [],
                        });
                    }
                });
                this.$nextTick(() => {
                    this.scrollToEnd();
                    this.$refs.composer?.focus?.();
                });
            }
        },

        close() {
            this.open = false;
        },

        async resetChat() {
            this.lead = this.resetLead();
            this.draft = '';
            this.messages = [];
            this.booted = false;
            await this.bootstrap().catch(() => {
                this.messages = [{
                    role: 'bot',
                    text: `Hi! I'm the ${this.companyName} assistant. How can I help today?`,
                    links: [],
                }];
            });
            this.$nextTick(() => this.scrollToEnd());
        },

        scrollToEnd() {
            const el = this.$refs.messages;
            if (el) {
                el.scrollTop = el.scrollHeight;
            }
        },

        async sendChip(chip) {
            if (!chip || this.busy) {
                return;
            }

            if (chip.id === 'cancel') {
                await this.postMessage('cancel');
                return;
            }

            if (chip.id === 'skip') {
                await this.postMessage('skip');
                return;
            }

            if (String(chip.id).startsWith('service:')) {
                await this.postMessage(chip.id);
                return;
            }

            await this.postMessage(chip.id);
        },

        async sendMessage() {
            const text = this.draft.trim();
            if (!text || this.busy) {
                return;
            }
            this.draft = '';
            await this.postMessage(text);
        },

        async postMessage(text) {
            this.busy = true;
            this.messages.push({ role: 'user', text, links: [] });
            this.$nextTick(() => this.scrollToEnd());

            try {
                const response = await fetch(config.messageUrl, {
                    method: 'POST',
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': config.csrf,
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({
                        message: text,
                        lead: this.lead,
                        website: this.honeypot,
                    }),
                });

                const data = await response.json().catch(() => ({}));

                if (!response.ok) {
                    const error =
                        data?.errors?.message?.[0] ||
                        data?.message ||
                        'Sorry, something went wrong. Please try again.';
                    this.messages.push({ role: 'bot', text: error, links: [] });
                    return;
                }

                this.lead = data.lead || this.resetLead();
                this.quickReplies = data.quick_replies || this.quickReplies;

                this.messages.push({
                    role: 'bot',
                    text: data.reply || 'How else can I help?',
                    links: data.links || [],
                });

                if (data.submit_lead) {
                    await this.submitLead();
                }
            } catch (e) {
                this.messages.push({
                    role: 'bot',
                    text: 'I could not reach the server. Please check your connection or use the Contact page.',
                    links: [],
                });
            } finally {
                this.busy = false;
                this.$nextTick(() => {
                    this.scrollToEnd();
                    this.$refs.composer?.focus?.();
                });
            }
        },

        async submitLead() {
            if (!this.lead?.name || !this.lead?.email) {
                return;
            }

            try {
                const response = await fetch(config.leadUrl, {
                    method: 'POST',
                    headers: {
                        Accept: 'application/json',
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': config.csrf,
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: JSON.stringify({
                        name: this.lead.name,
                        email: this.lead.email,
                        phone: this.lead.phone,
                        service: this.lead.service,
                        message: this.lead.message,
                        website: this.honeypot,
                    }),
                });

                const data = await response.json().catch(() => ({}));

                if (response.ok && data.ok) {
                    this.messages.push({
                        role: 'bot',
                        text: data.message || 'Thanks! Our team will contact you shortly.',
                        links: [],
                    });
                } else {
                    const error =
                        data?.errors?.email?.[0] ||
                        data?.message ||
                        'We could not save your details. Please use the Contact page.';
                    this.messages.push({ role: 'bot', text: error, links: [] });
                }
            } catch (e) {
                this.messages.push({
                    role: 'bot',
                    text: 'Lead could not be sent right now. Please try the Contact page.',
                    links: [],
                });
            }

            this.lead = this.resetLead();
            await this.bootstrapQuickReplies();
        },

        async bootstrapQuickReplies() {
            try {
                const response = await fetch(config.bootstrapUrl, {
                    headers: {
                        Accept: 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });
                if (response.ok) {
                    const data = await response.json();
                    this.quickReplies = data.quick_replies || this.quickReplies;
                }
            } catch (e) {
                // ignore
            }
        },

        resetLead() {
            return {
                step: null,
                name: null,
                email: null,
                phone: null,
                service: null,
                message: null,
            };
        },
    }));
});
