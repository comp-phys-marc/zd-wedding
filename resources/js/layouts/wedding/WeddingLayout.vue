<template>
    <div>
        <!-- Sticky Header Container -->
        <div id="header-container">
            <!-- Floral Arch background -->
            <div id="floral-arch-background"></div>
            <!-- Hero Section (Centered) -->
            <div class="max-w-4xl mx-auto hero-content-wrapper">
                <header id="hero-header" class="text-center pt-20 pb-12 px-6">
                    <div class="divider-line w-24 h-px bg-teal/50 mx-auto mb-6"></div>
                    <h1 class="text-5xl md:text-7xl font-semibold tracking-wider">Zacharie &amp; Deborah</h1>
                    <p class="text-lg md:text-xl mt-4 tracking-widest uppercase text-gray-600">Are getting married</p>
                    <div class="divider-line w-24 h-px bg-teal/50 mx-auto mt-6"></div>
                </header>
            </div>
            <!-- Navigation (Full-width) -->
            <nav id="site-nav">
                <ul class="flex justify-center items-center flex-wrap space-x-2 md:space-x-4 py-4">
                    <li v-for="tab in tabs" :key="tab.id">
                        <a href="#" class="nav-link uppercase tracking-wider text-sm font-medium" :class="{ active: activeTab === tab.id }" @click.prevent="$emit('tab-change', tab.id)">
                            {{ tab.label }}
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <slot />
        <!-- Footer -->
        <footer class="text-center py-12 px-6 border-t border-teal/20 mt-16">
            <div class="w-16 h-px bg-teal/50 mx-auto mb-6"></div>
            <p class="text-teal font-serif text-2xl">Z &amp; D</p>
            <p class="text-gray-500 text-sm mt-2">October 5, 2025</p>
        </footer>
    </div>
</template>

<script lang="ts">
export default {
    name: 'WeddingLayout',
    props: {
        tabs: Array,
        activeTab: String
    }
};
</script>
