<template>
  <div class="layout-wrapper">
    <ScrollProgress />
    <TheNavbar />
    <main>
      <slot />
    </main>
    <TheFooter />
  </div>
</template>

<script setup>
import { onMounted, nextTick } from 'vue'
import { router } from '@inertiajs/vue3'
import ScrollProgress from '../Components/ScrollProgress.vue'
import TheNavbar from '../Components/TheNavbar.vue'
import TheFooter from '../Components/TheFooter.vue'
import { useAppInteractions } from '../Composables/useAppInteractions'

const { initInteractions } = useAppInteractions()

onMounted(() => {
  nextTick(() => {
    initInteractions()
  })
})

router.on('finish', () => {
  nextTick(() => {
    initInteractions()
    window.scrollTo({ top: 0, behavior: 'instant' })
  })
})
</script>
