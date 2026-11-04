<template>
  <Head title="Contact Us — Talk to the Team">
    <meta name="description" content="Contact Anantyodya Welfare Foundation for volunteering, CSR partnerships, program inquiries, or documentation in Patna, Bihar.">
  </Head>

  <DefaultLayout>
    <section class="phero">
      <div class="blob blob-a"></div>
      <div class="wrap">
        <div class="crumbs" data-reveal><Link href="/">Home</Link><span>/</span>Contact</div>
        <h1 data-reveal data-delay="60">Talk to <span class="grad-text">the team</span>.</h1>
        <p class="lede" data-reveal data-delay="120">Volunteering, CSR, documents, media or a programme in your district — write to us and a director will respond.</p>
      </div>
    </section>

    <section class="sec">
      <div class="wrap split" style="align-items:start">
        <div class="txt">
          <div class="eyebrow" data-reveal>Send a message</div>
          <h2 data-reveal data-delay="60" style="font-size:clamp(1.8rem,3vw,2.5rem)">We read every enquiry.</h2>

          <!-- Success Flash Message -->
          <div v-if="$page.props.flash && $page.props.flash.success" class="note" style="margin-top:20px;border-left:4px solid var(--green);background:rgba(30,155,75,0.08);color:var(--green-deep);padding:14px 18px;border-radius:8px">
            <strong>✓ Success!</strong> {{ $page.props.flash.success }}
          </div>

          <!-- General Error Message -->
          <div v-if="$page.props.flash && $page.props.flash.error" class="note" style="margin-top:20px;border-left:4px solid var(--red);background:rgba(227,30,36,0.08);color:var(--red);padding:14px 18px;border-radius:8px">
            <strong>✕ Error:</strong> {{ $page.props.flash.error }}
          </div>

          <form id="contactForm" data-reveal data-delay="110" style="margin-top:26px" @submit.prevent="submit">
            <div class="form-grid">
              <div class="field">
                <label for="name">Your name *</label>
                <input
                  id="name"
                  v-model="form.name"
                  type="text"
                  placeholder="Full name"
                  required
                  :disabled="form.processing"
                >
                <span v-if="form.errors.name" style="color:var(--red);font-size:0.8rem;margin-top:4px;display:block">
                  {{ form.errors.name }}
                </span>
              </div>

              <div class="field">
                <label for="email">Email *</label>
                <input
                  id="email"
                  v-model="form.email"
                  type="email"
                  placeholder="you@example.com"
                  required
                  :disabled="form.processing"
                >
                <span v-if="form.errors.email" style="color:var(--red);font-size:0.8rem;margin-top:4px;display:block">
                  {{ form.errors.email }}
                </span>
              </div>

              <div class="field">
                <label for="phone">Phone</label>
                <input
                  id="phone"
                  v-model="form.phone"
                  type="tel"
                  placeholder="+91"
                  :disabled="form.processing"
                >
                <span v-if="form.errors.phone" style="color:var(--red);font-size:0.8rem;margin-top:4px;display:block">
                  {{ form.errors.phone }}
                </span>
              </div>

              <div class="field">
                <label for="topic">I am writing about</label>
                <select id="topic" v-model="form.topic" :disabled="form.processing">
                  <option value="Volunteering">Volunteering</option>
                  <option value="CSR / partnership">CSR / partnership</option>
                  <option value="Supporting a programme">Supporting a programme</option>
                  <option value="Requesting documents">Requesting documents</option>
                  <option value="Media / press">Media / press</option>
                  <option value="Something else">Something else</option>
                </select>
              </div>

              <div class="field full">
                <label for="message">Message *</label>
                <textarea
                  id="message"
                  v-model="form.message"
                  placeholder="Tell us what you have in mind — the programme, the district, the dates."
                  required
                  :disabled="form.processing"
                  rows="4"
                ></textarea>
                <span v-if="form.errors.message" style="color:var(--red);font-size:0.8rem;margin-top:4px;display:block">
                  {{ form.errors.message }}
                </span>
              </div>
            </div>

            <button
              class="btn btn-primary"
              type="submit"
              :disabled="form.processing"
              style="margin-top:20px"
            >
              <span v-if="form.processing">Sending message...</span>
              <span v-else>Send message</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14M12 5l7 7-7 7"/>
              </svg>
            </button>

            <p class="form-note" id="formNote" style="margin-top:14px">
              Messages are recorded securely in our database and routed to the leadership team.
            </p>
          </form>
        </div>

        <div>
          <div class="bank" data-reveal="right">
            <h4 style="font-size:1.05rem;margin-bottom:16px">Registered office</h4>
            <p style="font-size:.94rem;margin-bottom:18px">
              Anantyodya Welfare Foundation<br>
              C/o Dharmendra Singh, Vill + Panch — Bara,<br>
              Tola — Gokhula, Block — Masaurhi,<br>
              Dist — Patna, Bihar 804452, India
            </p>
            <div class="bank-row"><span>Email</span><b style="font-size:.83rem">info@samridhwelfarefoundation.com</b></div>
            <div class="bank-row"><span>State</span><b>Bihar</b></div>
            <div class="bank-row"><span>ROC</span><b>Patna · 079410</b></div>
          </div>

          <div class="bank" style="margin-top:18px" data-reveal="right" data-delay="80">
            <h4 style="font-size:1.05rem;margin-bottom:16px">Statutory identifiers</h4>
            <div class="bank-row"><span>CIN</span><b class="mono" style="font-size:.79rem">U86909BR2025NPL079410</b></div>
            <div class="bank-row"><span>PAN</span><b class="mono">ABDCA9121B</b></div>
            <div class="bank-row"><span>TAN</span><b class="mono">PTNA13397G</b></div>
            <div class="bank-row"><span>Section 8 licence</span><b>174263</b></div>
            <div class="bank-row"><span>Udyam</span><b class="mono" style="font-size:.79rem">UDYAM-BR-26-0196426</b></div>
          </div>

          <div class="bank" style="margin-top:18px" data-reveal="right" data-delay="160">
            <h4 style="font-size:1.05rem;margin-bottom:14px">Directors</h4>
            <div class="bank-row"><span>Hari Om Sharan</span><b>DIN 11328475</b></div>
            <div class="bank-row"><span>Sudhanshu Shekhar</span><b>DIN 11195950</b></div>
          </div>
        </div>
      </div>
    </section>

    <section class="sec-tight" style="background:#fff">
      <div class="wrap">
        <div class="center" style="margin-bottom:40px">
          <div class="eyebrow center-line" data-reveal>Find us</div>
          <h2 data-reveal data-delay="60">Masaurhi, Patna</h2>
          <p class="lede lead-c" data-reveal data-delay="110">The registered office sits in the Masaurhi block of Patna district, south of the city — the rural belt where the Foundation's programmes begin.</p>
        </div>
        <div class="split-img" style="aspect-ratio:21/9;max-width:1000px;margin:0 auto" data-reveal>
          <iframe
            title="Anantyodya Welfare Foundation location"
            src="https://www.openstreetmap.org/export/embed.html?bbox=85.09%2C25.29%2C85.24%2C25.38&amp;layer=mapnik&amp;marker=25.3335%2C85.1641"
            style="border:0;width:100%;height:100%;filter:saturate(.9)"
            loading="lazy"
          ></iframe>
        </div>
      </div>
    </section>

    <section class="sec">
      <div class="wrap">
        <div class="cta-panel" data-reveal="scale">
          <div class="eyebrow center-line" style="color:#F7941D">Before you go</div>
          <h2>Read the record first.</h2>
          <p>Certificates, licences, MOA and AOA — all published, all checkable.</p>
          <div class="hero-cta"><Link class="btn btn-light" href="/governance">Governance &amp; compliance</Link></div>
        </div>
      </div>
    </section>
  </DefaultLayout>
</template>

<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3'
import DefaultLayout from '../Layouts/DefaultLayout.vue'

const form = useForm({
  name: '',
  email: '',
  phone: '',
  topic: 'Volunteering',
  message: '',
})

const submit = () => {
  form.post('/contact', {
    preserveScroll: true,
    onSuccess: () => {
      form.reset()
    },
  })
}
</script>
