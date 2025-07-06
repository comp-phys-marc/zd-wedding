<template>
  <div class="max-w-4xl mx-auto">
    <Card>
      <section class="py-16 text-center">
        <h2 class="text-5xl font-semibold mb-4">Registry</h2>
        <p class="text-lg text-gray-700 mb-10">
          Your presence at our wedding is the greatest gift we could ask for. However, if you wish to honor us with a gift, we have registered at the following places for items we would love to have in our home.
        </p>
        <div class="flex flex-col sm:flex-row justify-center items-center gap-6">
          <a href="#" target="_blank" class="inline-block border border-teal text-teal font-semibold tracking-widest uppercase py-3 px-12 rounded-full hover:bg-teal hover:text-cream transition-colors duration-300 shadow-sm">
            Crate &amp; Barrel
          </a>
          <a href="#" target="_blank" class="inline-block border border-teal text-teal font-semibold tracking-widest uppercase py-3 px-12 rounded-full hover:bg-teal hover:text-cream transition-colors duration-300 shadow-sm">
            Zola
          </a>
        </div>
      </section>
    </Card>
  </div>
</template>

<script lang="ts">
import Card from '../WeddingCard.vue';
export default {
  name: 'RegistryPage',
  components: { Card },
};
</script>
