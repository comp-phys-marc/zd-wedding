<template>
  <div class="max-w-4xl mx-auto">
    <Card>
      <section class="py-16">
        <div class="text-center mb-12">
          <h2 class="text-5xl font-semibold">The Venue</h2>
          <p class="mt-2 text-gray-600">Celebrating at the historic Hart House, surrounded by the beauty of Vancouver.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
          <div class="rounded-lg shadow-lg overflow-hidden photo-block">
            <img src="http://www.zdwedding.com/images/Hart_House_Restaurant.png" @error="imgFallback($event, 'Vancouver+Mountains')" alt="Scenic view of Vancouver mountains" class="w-full h-auto object-cover">
          </div>
          <div class="rounded-lg shadow-lg overflow-hidden photo-block">
            <img src="http://www.zdwedding.com/images/Hart_House_Reception_4_by_3.jpg" @error="imgFallback($event, 'Hart+House')" alt="Hart House Restaurant wedding venue" class="w-full h-auto object-cover">
          </div>
        </div>
      </section>
    </Card>
  </div>
</template>

<script lang="ts">
import Card from '../WeddingCard.vue';
export default {
  name: 'VenuePage',
  components: { Card },
  methods: {
    imgFallback(event, text) {
      event.target.onerror = null;
      event.target.src = `https://placehold.co/1200x800/F7F4EC/6B979A?text=${text}`;
    },
  },
};
</script>
