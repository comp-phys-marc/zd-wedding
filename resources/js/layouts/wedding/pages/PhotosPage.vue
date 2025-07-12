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
            <img src="http://www.zdwedding.com/images/1.JPG" @error="imgFallback($event, 'Memory')" alt="Couple portrait" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-2 sm:row-span-2">
            <img src="http://www.zdwedding.com/images/2.CR2" @error="imgFallback($event, 'Lakeside+Ceremony')" alt="Lakeside wedding ceremony" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-1 sm:row-span-1">
            <img src="http://www.zdwedding.com/images/3.ARW" @error="imgFallback($event, 'Memory')" alt="Wedding cake" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-1 sm:row-span-1">
            <img src="http://www.zdwedding.com/images/4.jpg" @error="imgFallback($event, 'Memory')" alt="Wedding rings" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-2 sm:row-span-1">
            <img src="http://www.zdwedding.com/images/5.CR2" @error="imgFallback($event, 'Memory')" alt="Wedding table setting" class="rounded-lg shadow-md w-full h-full object-cover">
          </div>
          <div class="sm:col-span-2 sm:row-span-1">
            <img src="http://www.zdwedding.com/images/6.jpg" @error="imgFallback($event, 'Memory')" alt="First dance" class="rounded-lg shadow-md w-full h-full object-cover">
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
