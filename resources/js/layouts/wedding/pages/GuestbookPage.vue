<template>
    <div class="mx-auto max-w-3xl">
        <Card>
            <section class="py-16">
                <div class="mb-12 text-center">
                    <h2 class="text-5xl font-semibold">Guest Book</h2>
                    <p class="mt-2 text-gray-600">Leave us a message to commemorate our special day.</p>
                </div>
                <form id="guestbook-form" action="https://formspree.io/f/mdkzpwyq" method="POST" @submit.prevent="submitGuestbook">
                    <div class="space-y-6">
                        <div>
                            <label for="guestName" class="mb-1 block text-sm font-medium text-gray-700">Your Name(s)</label>
                            <input
                                type="text"
                                id="guestName"
                                name="name"
                                class="form-input"
                                placeholder="e.g., Jane &amp; John Doe"
                                :myProp="guestName"
                                @update:myProp="updateGuestName"
                                required
                            />
                        </div>
                        <div>
                            <label for="guestMessage" class="mb-1 block text-sm font-medium text-gray-700">Write A Message</label>
                            <textarea
                                id="guestMessage"
                                name="message"
                                class="form-input"
                                rows="4"
                                placeholder="Share a memory or a wish for our future..."
                                :myProp="guestMessage"
                                @update:myProp="updateGuestMessage"
                                required
                            ></textarea>
                        </div>
                        <div>
                            <button
                                type="submit"
                                id="sendMessageBtn"
                                class="bg-teal text-cream hover:bg-teal-dark w-full rounded-lg px-8 py-3 font-semibold tracking-widest uppercase shadow-lg transition-colors duration-300"
                                :disabled="sending"
                            >
                                {{ sending ? 'Sending...' : 'Send Message' }}
                            </button>
                        </div>
                        <div id="form-status" class="h-6">
                            <p v-if="formStatus" :class="formStatusClass">{{ formStatus }}</p>
                        </div>
                    </div>
                </form>
                <div class="bg-teal/20 my-12 h-px w-full"></div>
                <div id="guestbook-entries" class="space-y-6">
                    <div v-for="(entry, idx) in guestbookEntries" :key="idx" class="border-teal/20 rounded-lg border bg-white/50 p-4">
                        <p class="text-gray-700 italic">"{{ entry.message }}"</p>
                        <p class="text-teal mt-2 text-right text-sm font-semibold">- {{ entry.name }}</p>
                    </div>
                    <!-- Example Entry -->
                    <div class="border-teal/20 rounded-lg border bg-white/50 p-4">
                        <p class="text-gray-700 italic">
                            "Wishing you both a lifetime of love and happiness. We are so thrilled to celebrate with you!"
                        </p>
                        <p class="text-teal mt-2 text-right text-sm font-semibold">- With love, The Smiths</p>
                    </div>
                </div>
            </section>
        </Card>
    </div>
</template>

<script lang="ts">
import Card from '../WeddingCard.vue';

export default {
    name: 'GuestbookPage',
    components: { Card },
    data() {
        return {
            guestName: 'John Smith',
            guestMessage: 'Have a wonderful day!',
        };
    },
    props: ['guestbookEntries', 'sending', 'formStatus', 'formStatusClass'],
    methods: {
        updateGuestName(newValue) {
            this.guestName = newValue;
        },
        updateGuestMessage(newValue) {
            this.guestMessage = newValue;
        },
        submitGuestbook() {
            this.$emit('submit-guestbook');
        },
    },
};
</script>
