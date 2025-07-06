<template>
  <div class="max-w-7xl mx-auto">
    <Card>
      <section class="py-16">
        <div class="text-center mb-12 max-w-4xl mx-auto">
          <h2 class="text-5xl font-semibold">Gallery</h2>
          <p class="mt-2 text-gray-600">A few cherished moments and memories.</p>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 grid-flow-dense gap-4">
          <div class="sm:col-span-1 sm:row-span-2">
            <img src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?q=80&w=800&h=1200&fit=crop" @error="imgFallback($event, 'Memory')" alt="Couple portrait" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-2 sm:row-span-2">
            <img src="https://images.unsplash.com/photo-1545569424-5d51387556a3?q=80&w=1200&h=800&fit=crop&crop=entropy" @error="imgFallback($event, 'Lakeside+Ceremony')" alt="Lakeside wedding ceremony" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-1 sm:row-span-1">
            <img src="https://images.unsplash.com/photo-1616048056617-93b94a339289?q=80&w=800&h=600&fit=crop" @error="imgFallback($event, 'Memory')" alt="Wedding cake" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-1 sm:row-span-1">
            <img src="https://images.unsplash.com/photo-1598214886532-332a52b82b92?q=80&w=800&h=600&fit=crop" @error="imgFallback($event, 'Memory')" alt="Wedding rings" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-2 sm:row-span-1">
            <img src="https://images.unsplash.com/photo-1558236209-54a7849925e5?q=80&w=1200&h=600&fit=crop" @error="imgFallback($event, 'Memory')" alt="Wedding table setting" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-2 sm:row-span-1">
            <img src="https://images.unsplash.com/photo-1597842895234-8070b945d43f?q=80&w=1200&h=600&fit=crop" @error="imgFallback($event, 'Memory')" alt="First dance" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
        </div>
      </section>
    </Card>
  </div>
</template>

<script lang="ts">
import Card from '../WeddingCard.vue';
export default {
  name: 'PhotosPage',
  components: { Card },
  methods: {
    imgFallback(event, text) {
      event.target.onerror = null;
      event.target.src = `https://placehold.co/1200x800/F7F4EC/6B979A?text=${text}`;
    },
  },
};
</script>
