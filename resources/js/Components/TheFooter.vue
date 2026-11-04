<template>
  <footer>
    <div class="wrap">
      <div class="foot-grid">
        <div>
          <div class="foot-brand">
            <img src="/assets/img/logo.png" alt="Anantyodya Welfare Foundation">
            <div><b>Anantyodya Welfare Foundation</b><span>For a better tomorrow</span></div>
          </div>
          <p style="font-size:.88rem;max-width:34ch">
            A Section 8 not-for-profit company registered in Patna, Bihar, working across healthcare, education, women &amp; child welfare, sports and community development.
          </p>
          <div class="socials">
            <a href="mailto:info@samridhwelfarefoundation.com" aria-label="Email">
              <svg viewBox="0 0 24 24"><path d="M2 4h20v16H2z" fill="none" stroke="currentColor" stroke-width="2"/><path d="m2 6 10 7 10-7" fill="none" stroke="currentColor" stroke-width="2"/></svg>
            </a>
            <Link href="/contact" aria-label="Contact">
              <svg viewBox="0 0 24 24"><path d="M22 16.9v3a2 2 0 0 1-2.2 2 19.8 19.8 0 0 1-8.6-3 19.5 19.5 0 0 1-6-6A19.8 19.8 0 0 1 2.1 4.2 2 2 0 0 1 4.1 2h3a2 2 0 0 1 2 1.7c.1 1 .4 1.9.7 2.8a2 2 0 0 1-.5 2.1L8.1 9.9a16 16 0 0 0 6 6l1.3-1.2a2 2 0 0 1 2.1-.5c.9.3 1.8.6 2.8.7a2 2 0 0 1 1.7 2z" fill="none" stroke="currentColor" stroke-width="2"/></svg>
            </Link>
          </div>
        </div>
        <div>
          <h5>Explore</h5>
          <ul>
            <li><Link href="/about">About the Foundation</Link></li>
            <li><Link href="/programs">Programmes</Link></li>
            <li><Link href="/governance">Governance</Link></li>
            <li><Link href="/gallery">Gallery</Link></li>
            <li><Link href="/get-involved">Get involved</Link></li>
          </ul>
        </div>
        <div>
          <h5>Our pillars</h5>
          <ul>
            <li><Link href="/programs#health">Healthcare for All</Link></li>
            <li><Link href="/programs#education">Education for Growth</Link></li>
            <li><Link href="/programs#food">Food for the Needy</Link></li>
            <li><Link href="/programs#women">Social Welfare</Link></li>
            <li><Link href="/programs#community">Community Development</Link></li>
          </ul>
        </div>
        <div>
          <h5>Registered office</h5>
          <p style="font-size:.88rem;margin-bottom:14px">
            C/o Dharmendra Singh, Vill + Panch — Bara, Tola — Gokhula, Block — Masaurhi, Dist — Patna, Bihar 804452
          </p>
          <p style="font-size:.88rem;margin-bottom:6px">
            <a href="mailto:info@samridhwelfarefoundation.com">info@samridhwelfarefoundation.com</a>
          </p>
          <p style="font-size:.88rem">
            CIN: U86909BR2025NPL079410<br>PAN: ABDCA9121B
          </p>
        </div>
      </div>
      <div class="foot-legal">
        <span>© {{ currentYear }} Anantyodya Welfare Foundation. All rights reserved.</span>
        <span class="ids">Section 8 Licence 174263 · UDYAM-BR-26-0196426</span>
      </div>
    </div>
  </footer>
</template>

<script setup>
import { computed } from 'vue'
import { Link } from '@inertiajs/vue3'

const currentYear = computed(() => new Date().getFullYear())
</script>
