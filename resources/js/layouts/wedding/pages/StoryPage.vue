<template>
  <div class="max-w-4xl mx-auto">
    <Card>
      <section class="py-16">
        <div class="text-center mb-12">
          <h2 class="text-5xl font-semibold">Our Story</h2>
        </div>
        <div class="max-w-3xl mx-auto text-gray-700 space-y-4 text-justify">
          <p>
            Our journey began on a crisp autumn day, not unlike the one we've chosen for our wedding. It started with a shared love for classic literature and a chance meeting at a small, dusty bookstore. What began as a conversation over faded pages quickly blossomed into something more profound.
          </p>
          <p>
            Through years of shared adventures, quiet moments, and endless support, we've built a life rooted in mutual respect and deep affection. From exploring ancient ruins on sun-drenched coasts to simply enjoying a coffee on a lazy Sunday morning, every moment has solidified what we knew from the very beginning: we were meant to be. We are so excited to start our next chapter as husband and wife, and even more excited to share the beginning of that journey with you.
          </p>
        </div>
      </section>
    </Card>
  </div>
</template>

<script lang="ts">
import Card from '../WeddingCard.vue';
export default {
  name: 'StoryPage',
  components: { Card },
};
</script>
