<template>
    <Card>
        <section class="py-16">
            <div class="mb-12 text-center">
                <h2 class="text-5xl font-semibold">Guest Book</h2>
                <p class="mt-2 text-gray-600">Leave us a message to commemorate our special day.</p>
            </div>
            <form id="guestbook-form" action="https://www.zdwedding.com/guestbook" method="POST" @submit.prevent="submitGuestbook">
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
</template>

<script lang="ts">
export default {
  name: 'GuestbookPage',
  data() {
    return {
      guestName: '',
      guestMessage: '',
      guestbookEntries: [],
      sending: false,
      formStatus: '',
      formStatusClass: '',
    };
  },
  methods: {
    async submitGuestbook() {
      if (!this.guestName.trim() || !this.guestMessage.trim()) return;
      this.sending = true;
      this.formStatus = '';
      this.formStatusClass = '';

      // Add entry instantly
      this.guestbookEntries.unshift({ name: this.guestName, message: this.guestMessage });

      try {
        const formData = new FormData();
        formData.append('name', this.guestName);
        formData.append('message', this.guestMessage);

        const response = await fetch('http://www.zdwedding.com/guestbook', {
          method: 'POST',
          body: formData,
          headers: { Accept: 'application/json' },
        });

        if (response.ok) {
          this.formStatus = 'Thank you! Your message has been sent.';
          this.formStatusClass = 'text-green-600 text-center text-sm mt-2';
          this.guestName = '';
          this.guestMessage = '';
        } else {
          const data = await response.json();
          if (data.errors) {
            this.formStatus = data.errors.map(e => e.message).join(', ');
          } else {
            this.formStatus = 'Oops! There was a problem submitting your form.';
          }
          this.formStatusClass = 'text-red-600 text-center text-sm mt-2';
          this.guestbookEntries.shift(); // Remove the entry
        }
      } catch (e) {
        this.formStatus = 'Oops! There was a problem submitting your form.';
        this.formStatusClass = 'text-red-600 text-center text-sm mt-2';
        this.guestbookEntries.shift();
      } finally {
        this.sending = false;
        setTimeout(() => {
          this.formStatus = '';
        }, 5000);
      }
    },
  },
};
</script>
