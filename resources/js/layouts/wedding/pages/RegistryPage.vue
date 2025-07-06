<template>
    <div class="mx-auto max-w-4xl">
        <Card>
            <section class="py-16 text-center">
                <h2 class="mb-4 text-5xl font-semibold">Registry</h2>
                <p class="mb-10 text-lg text-gray-700">
                    We're incredibly excited about the journey ahead as we prepare to start our married life.
                </p>
                <p class="mb-10 text-lg text-gray-700">
                    As we are in the midst of moving to
                    Lesotho in Africa to continue serving with Mission Aviation Fellowship, we've decided not to have a traditional registry. Instead,
                    for those who wish to honor us with a gift, please know that a contribution to help build our future together would be deeply
                    appreciated.
                </p>
                <p class="mb-10 text-lg text-gray-700">
                    Any gift would be put towards our honeymoon, travels, and/or household items as we settle into our new life in
                    Lesotho.
                </p>
                <p class="mb-10 text-lg text-gray-700">
                    Thank you for being a part of our journey!
                </p>
                <div class="flex flex-col items-center justify-center gap-6 sm:flex-row">
                    <a
                        href="#"
                        target="_blank"
                        class="border-teal text-teal hover:bg-teal hover:text-cream inline-block rounded-full border px-12 py-3 font-semibold tracking-widest uppercase shadow-sm transition-colors duration-300"
                    >
                        Crate &amp; Barrel
                    </a>
                    <a
                        href="#"
                        target="_blank"
                        class="border-teal text-teal hover:bg-teal hover:text-cream inline-block rounded-full border px-12 py-3 font-semibold tracking-widest uppercase shadow-sm transition-colors duration-300"
                    >
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
