<template>
  <div id="progress" :style="{ width: progress + '%' }"></div>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const progress = ref(0)

const onScroll = () => {
  const y = window.scrollY || window.pageYOffset
  const h = document.documentElement.scrollHeight - window.innerHeight
  progress.value = h > 0 ? (y / h) * 100 : 0
}

onMounted(() => {
  window.addEventListener('scroll', onScroll, { passive: true })
  onScroll()
})

onUnmounted(() => {
  window.removeEventListener('scroll', onScroll)
})
</script>
