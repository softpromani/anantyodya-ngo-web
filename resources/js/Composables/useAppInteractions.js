export const useAppInteractions = () => {
  const initInteractions = () => {
    if (typeof window === 'undefined') return

    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches

    // Scroll reveal observer
    const revealEls = document.querySelectorAll('[data-reveal]')
    if (reduce || !('IntersectionObserver' in window)) {
      revealEls.forEach((el) => el.classList.add('in'))
    } else {
      const io = new IntersectionObserver((entries) => {
        entries.forEach((e) => {
          if (e.isIntersecting) {
            const el = e.target
            const delay = el.getAttribute('data-delay')
            if (delay) el.style.transitionDelay = `${delay}ms`
            el.classList.add('in')
            io.unobserve(el)
          }
        })
      }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' })
      revealEls.forEach((el) => io.observe(el))
    }

    // Number counters
    const counters = document.querySelectorAll('[data-count]')
    const runCounter = (el) => {
      const target = parseFloat(el.getAttribute('data-count') || '0')
      const dur = parseInt(el.getAttribute('data-dur') || '1500', 10)
      const dec = parseInt(el.getAttribute('data-dec') || '0', 10)
      const prefix = el.getAttribute('data-prefix') || ''
      const suffix = el.getAttribute('data-suffix') || ''
      if (reduce) {
        el.textContent = prefix + target.toFixed(dec) + suffix
        return
      }
      const start = performance.now()
      const tick = (now) => {
        const p = Math.min((now - start) / dur, 1)
        const eased = 1 - Math.pow(1 - p, 3)
        el.textContent = prefix + (target * eased).toFixed(dec) + suffix
        if (p < 1) requestAnimationFrame(tick)
        else el.textContent = prefix + target.toFixed(dec) + suffix
      }
      requestAnimationFrame(tick)
    }

    if (counters.length) {
      if ('IntersectionObserver' in window) {
        const co = new IntersectionObserver((entries) => {
          entries.forEach((e) => {
            if (e.isIntersecting) {
              runCounter(e.target)
              co.unobserve(e.target)
            }
          })
        }, { threshold: 0.6 })
        counters.forEach((c) => co.observe(c))
      } else {
        counters.forEach(runCounter)
      }
    }

    // Tilt micro-interaction
    if (!reduce && window.matchMedia('(hover:hover)').matches) {
      document.querySelectorAll('[data-tilt]').forEach((card) => {
        const element = card
        element.onmousemove = (ev) => {
          const r = element.getBoundingClientRect()
          const rx = ((ev.clientY - r.top) / r.height - 0.5) * -5
          const ry = ((ev.clientX - r.left) / r.width - 0.5) * 5
          element.style.transform = `perspective(900px) rotateX(${rx.toFixed(2)}deg) rotateY(${ry.toFixed(2)}deg) translateY(-6px)`
        }
        element.onmouseleave = () => {
          element.style.transform = ''
        }
      })
    }
  }

  return { initInteractions }
}
