<template>
  <div class="page-content py-12">
    <div class="max-w-3xl mx-auto">
      <!-- Add your guestbook page template here -->
      <form @submit.prevent="submitGuestbook" class="space-y-4">
        <!-- Your form inputs here -->
        <div v-if="formStatus" :class="formStatusClass">{{ formStatus }}</div>
      </form>

      <div class="mt-8">
        <div v-for="(entry, index) in guestbookEntries" :key="index" class="mb-4">
          <!-- Guestbook entries display -->
        </div>
      </div>
    </div>
  </div>
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
        this.formStatus = `Oops! There was a problem submitting your form: ${e}`;
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
