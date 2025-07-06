<template>
  <div class="max-w-4xl mx-auto">
    <Card>
      <div :style="homeBgStyle" class="bg-cover bg-center rounded-lg">
        <section class="text-center max-w-2xl mx-auto py-20">
          <h2 class="text-4xl font-semibold mb-4">October 4, 2025</h2>
          <p class="text-lg text-gray-700 mb-12">
            We joyfully invite you to celebrate our marriage in a place that has captured our hearts. Please join us for an evening of love, laughter, and celebration.
          </p>
          <div class="w-full h-px bg-teal/20 my-12"></div>
          <h3 class="text-3xl font-semibold mb-3">Ceremony &amp; Reception</h3>
          <p class="text-lg font-semibold text-gray-700 mb-2">4:00 PM</p>
          <p class="mb-2 text-gray-600">Hart House Restaurant</p>
          <p class="mb-4 text-gray-600">6664 Deer Lake Avenue, Burnaby, BC</p>
        </section>
      </div>
    </Card>
  </div>
</template>

<script lang="ts">
import Card from '../WeddingCard.vue';
export default {
  name: 'HomePage',
  components: { Card },
  props: ['homeBgStyle'],
};
</script>
