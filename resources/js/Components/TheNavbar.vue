<template>
  <header class="nav" :class="{ scrolled: isScrolled }">
    <div class="wrap nav-inner">
      <Link class="brand" href="/" @click="closeMenu">
        <img src="/assets/img/logo.png" alt="Anantyodya Welfare Foundation logo">
        <span class="brand-txt"><b>Anantyodya</b><span>Welfare Foundation</span></span>
      </Link>
      <ul class="nav-links">
        <li><Link href="/" :class="{ active: $page.url === '/' }" @click="closeMenu">Home</Link></li>
        <li><Link href="/about" :class="{ active: $page.url.startsWith('/about') }" @click="closeMenu">About</Link></li>
        <li><Link href="/programs" :class="{ active: $page.url.startsWith('/programs') }" @click="closeMenu">Programs</Link></li>
        <li><Link href="/governance" :class="{ active: $page.url.startsWith('/governance') }" @click="closeMenu">Governance</Link></li>
        <li><Link href="/gallery" :class="{ active: $page.url.startsWith('/gallery') }" @click="closeMenu">Gallery</Link></li>
        <li><Link href="/get-involved" :class="{ active: $page.url.startsWith('/get-involved') }" @click="closeMenu">Get Involved</Link></li>
      </ul>
      <Link class="btn btn-red btn-sm nav-cta" href="/contact" @click="closeMenu">
        Contact us
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M5 12h14M12 5l7 7-7 7"/>
        </svg>
      </Link>
      <button
        class="burger"
        aria-label="Menu"
        :aria-expanded="isMenuOpen"
        @click="toggleMenu"
      >
        <span></span>
        <span></span>
        <span></span>
      </button>
    </div>
  </header>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { Link, usePage } from '@inertiajs/vue3'

const isScrolled = ref(false)
const isMenuOpen = ref(false)

const handleScroll = () => {
  const y = window.scrollY || window.pageYOffset
  isScrolled.value = y > 30
}

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value
  if (isMenuOpen.value) {
    document.body.classList.add('nav-open')
  } else {
    document.body.classList.remove('nav-open')
  }
}

const closeMenu = () => {
  isMenuOpen.value = false
  document.body.classList.remove('nav-open')
}

onMounted(() => {
  window.addEventListener('scroll', handleScroll, { passive: true })
  handleScroll()
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
  document.body.classList.remove('nav-open')
})
</script>
