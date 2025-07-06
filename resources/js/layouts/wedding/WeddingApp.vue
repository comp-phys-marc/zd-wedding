<template>
  <div class="bg-cream leading-relaxed antialiased">
    <WeddingLayout :tabs="tabs" :activeTab="activeTab" @tab-change="switchTab">
      <div class="max-w-7xl mx-auto">
        <main class="px-6 md:px-8">
          <HomePage v-show="activeTab === 'page-home'" :homeBgStyle="homeBgStyle" />
          <StoryPage v-show="activeTab === 'page-story'" />
          <VenuePage v-show="activeTab === 'page-venue'" />
          <PhotosPage v-show="activeTab === 'page-photos'" />
          <GuestbookPage
            v-show="activeTab === 'page-guestbook'"
            :guestbookEntries="guestbookEntries"
            :sending="sending"
            :formStatus="formStatus"
            :formStatusClass="formStatusClass"
            @submit-guestbook="submitGuestbook"
          />
          <RegistryPage v-show="activeTab === 'page-registry'" />
        </main>
      </div>
    </WeddingLayout>
  </div>
</template>

<script lang="ts">
import WeddingLayout from './WeddingLayout.vue';
import HomePage from './pages/HomePage.vue';
import StoryPage from './pages/StoryPage.vue';
import VenuePage from './pages/VenuePage.vue';
import PhotosPage from './pages/PhotosPage.vue';
import GuestbookPage from './pages/GuestbookPage.vue';
import RegistryPage from './pages/RegistryPage.vue';
export default {
  name: 'WeddingApp',
  components: {
    WeddingLayout,
    HomePage,
    StoryPage,
    VenuePage,
    PhotosPage,
    GuestbookPage,
    RegistryPage,
  },
  data() {
    return {
      tabs: [
        { id: 'page-home', label: 'Home' },
        { id: 'page-story', label: 'Our Story' },
        { id: 'page-venue', label: 'Venue' },
        { id: 'page-photos', label: 'Photos' },
        { id: 'page-guestbook', label: 'Guest Book' },
        { id: 'page-registry', label: 'Registry' },
      ],
      activeTab: 'page-home',
      guestName: '',
      guestMessage: '',
      guestbookEntries: [],
      sending: false,
      formStatus: '',
      formStatusClass: '',
    };
  },
  computed: {
    homeBgStyle() {
      return {
        backgroundImage:
          "linear-gradient(rgba(247, 244, 236, 0.75), rgba(247, 244, 236, 0.75)), url('https://images.unsplash.com/photo-1545569424-5d51387556a3?q=80&w=2070&auto=format&fit=crop')",
      };
    },
  },
  mounted() {
    window.addEventListener('scroll', this.handleScroll);
  },
  beforeDestroy() {
    window.removeEventListener('scroll', this.handleScroll);
  },
  methods: {
    switchTab(tabId) {
      this.activeTab = tabId;
    },
    handleScroll() {
      if (window.scrollY > 50) {
        document.body.classList.add('scrolled');
      } else {
        document.body.classList.remove('scrolled');
      }
    },
    imgFallback(event, text) {
      event.target.onerror = null;
      event.target.src = `https://placehold.co/1200x800/F7F4EC/6B979A?text=${text}`;
    },
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
        const response = await fetch('https://formspree.io/f/mdkzpwyq', {
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

<style>
@import url('https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Montserrat:wght@300;400;500&display=swap');

body {
  font-family: 'Montserrat', sans-serif;
  background-color: #F7F4EC;
  color: #4a4a4a;
}
h1, h2, h3, h4, h5, h6 {
  font-family: 'Cormorant Garamond', serif;
  color: #6B979A;
}
.bg-cream {
  background-color: #F7F4EC;
}
.bg-teal {
  background-color: #6B979A;
}
.text-teal {
  color: #6B979A;
}
.text-cream {
  color: #F7F4EC;
}
.border-teal {
  border-color: #6B979A;
}
#header-container {
  position: sticky;
  top: 0;
  z-index: 50;
  background-color: transparent;
  transition: background-color 0.3s ease-out, box-shadow 0.3s ease-out;
}
#hero-header {
  transition: padding 0.3s ease-out;
  background-color: #F7F4EC;
}
#hero-header h1 {
  transition: font-size 0.3s ease-out;
}
#hero-header p,
#hero-header .divider-line {
  transition: opacity 0.2s ease-out, max-height 0.3s ease-out, margin 0.3s ease-out;
  max-height: 100px;
  overflow: hidden;
}
#floral-arch-background {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  background-image: url('https://images.unsplash.com/photo-1587961271383-a3673f89658e?q=80&w=2000');
  background-position: center bottom;
  background-repeat: no-repeat;
  background-size: cover;
  z-index: 1;
  pointer-events: none;
  opacity: 0.15;
  transition: opacity 0.3s ease-out;
}
.hero-content-wrapper,
#site-nav {
  position: relative;
  z-index: 2;
}
body.scrolled #header-container {
  background-color: rgba(247, 244, 236, 0.65);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}
body.scrolled #hero-header {
  padding-top: 1rem;
  padding-bottom: 1rem;
  background-color: transparent;
}
body.scrolled #hero-header h1 {
  font-size: 1.875rem;
}
body.scrolled #hero-header p,
body.scrolled #hero-header .divider-line {
  opacity: 0;
  max-height: 0;
  margin: 0;
}
body.scrolled #floral-arch-background {
  opacity: 0;
}
body.scrolled #site-nav ul {
  background-color: transparent;
  box-shadow: none;
  border-color: transparent;
  background-image: none;
}
#site-nav {
  width: 100%;
}
#site-nav ul {
  background-color: #F7F4EC;
  background-image: linear-gradient(45deg, rgba(0, 0, 0, 0.015) 25%, transparent 25%, transparent 75%, rgba(0, 0, 0, 0.015) 75%, rgba(0, 0, 0, 0.015)), linear-gradient(45deg, rgba(0, 0, 0, 0.015) 25%, transparent 25%, transparent 75%, rgba(0, 0, 0, 0.015) 75%, rgba(0, 0, 0, 0.015));
  background-size: 3px 3px;
  background-position: 0 0, 1.5px 1.5px;
  box-shadow: inset 0 3px 6px rgba(0, 0, 0, 0.07);
  border-top: 1px solid rgba(107, 151, 154, 0.15);
  border-bottom: 1px solid rgba(107, 151, 154, 0.15);
  transition: all 0.3s ease-out;
}
.nav-link {
  transition: all 0.2s ease-out;
  border: 1px solid rgba(107, 151, 154, 0.15);
  padding: 8px 24px;
  border-radius: 9999px;
}
.nav-link:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(107, 151, 154, 0.2);
  background-color: #F7F4EC;
  border-color: rgba(107, 151, 154, 0.3);
}
.nav-link.active {
  color: #F7F4EC;
  background-color: #6B979A;
  border-color: #6B979A;
  transform: translateY(0);
  box-shadow: none;
}
.nav-link.active:hover {
  background-color: #6B979A;
  transform: translateY(0);
  box-shadow: none;
}
.page-content {
  animation: fadeIn 0.5s ease;
}
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}
#page-photos .grid img,
#page-venue .grid img,
.photo-block {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
#page-photos .grid img:hover,
#page-venue .grid img:hover,
.photo-block:hover {
  transform: scale(1.03);
  box-shadow: 0 8px 25px rgba(107, 151, 154, 0.3);
  z-index: 10;
}
.form-input {
  width: 100%;
  border: 1px solid #d1ccc0;
  background-color: #fff;
  border-radius: 0.5rem;
  padding: 0.75rem 1rem;
  transition: border-color 0.3s;
}
.form-input:focus {
  outline: none;
  border-color: #6B979A;
}
</style>
