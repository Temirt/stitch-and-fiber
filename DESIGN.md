---
name: Artisanal Stitch
colors:
  surface: '#fbf9f8'
  surface-dim: '#dcd9d9'
  surface-bright: '#fbf9f8'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f6f3f2'
  surface-container: '#f0eded'
  surface-container-high: '#eae7e7'
  surface-container-highest: '#e4e2e1'
  on-surface: '#1b1c1c'
  on-surface-variant: '#43483d'
  inverse-surface: '#303030'
  inverse-on-surface: '#f3f0f0'
  outline: '#74796c'
  outline-variant: '#c4c8ba'
  surface-tint: '#486730'
  primary: '#486730'
  on-primary: '#ffffff'
  primary-container: '#87a96b'
  on-primary-container: '#213d0b'
  inverse-primary: '#aed18f'
  secondary: '#9f402d'
  on-secondary: '#ffffff'
  secondary-container: '#fd876f'
  on-secondary-container: '#732010'
  tertiary: '#5e604d'
  on-tertiary: '#ffffff'
  tertiary-container: '#9fa08a'
  on-tertiary-container: '#353726'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#c9eea9'
  primary-fixed-dim: '#aed18f'
  on-primary-fixed: '#0b2000'
  on-primary-fixed-variant: '#314e1b'
  secondary-fixed: '#ffdad3'
  secondary-fixed-dim: '#ffb4a5'
  on-secondary-fixed: '#3e0500'
  on-secondary-fixed-variant: '#802918'
  tertiary-fixed: '#e4e4cc'
  tertiary-fixed-dim: '#c8c8b0'
  on-tertiary-fixed: '#1b1d0e'
  on-tertiary-fixed-variant: '#474836'
  background: '#fbf9f8'
  on-background: '#1b1c1c'
  surface-variant: '#e4e2e1'
typography:
  display-lg:
    fontFamily: Playfair Display
    fontSize: 48px
    fontWeight: '700'
    lineHeight: '1.1'
    letterSpacing: -0.02em
  display-lg-mobile:
    fontFamily: Playfair Display
    fontSize: 36px
    fontWeight: '700'
    lineHeight: '1.2'
  headline-md:
    fontFamily: Playfair Display
    fontSize: 32px
    fontWeight: '600'
    lineHeight: '1.3'
  headline-sm:
    fontFamily: Playfair Display
    fontSize: 24px
    fontWeight: '600'
    lineHeight: '1.4'
  body-lg:
    fontFamily: Montserrat
    fontSize: 18px
    fontWeight: '400'
    lineHeight: '1.6'
  body-md:
    fontFamily: Montserrat
    fontSize: 16px
    fontWeight: '400'
    lineHeight: '1.6'
  label-md:
    fontFamily: Montserrat
    fontSize: 14px
    fontWeight: '600'
    lineHeight: '1.2'
    letterSpacing: 0.05em
  caption:
    fontFamily: Montserrat
    fontSize: 12px
    fontWeight: '500'
    lineHeight: '1.4'
rounded:
  sm: 0.25rem
  DEFAULT: 0.5rem
  md: 0.75rem
  lg: 1rem
  xl: 1.5rem
  full: 9999px
spacing:
  unit: 8px
  container-max: 1200px
  gutter: 24px
  margin-desktop: 64px
  margin-mobile: 24px
---

## Brand & Style

This design system is built for a boutique crochet studio, emphasizing the slow-craft movement and high-end textile artistry. The brand personality is **calm, artisanal, and premium**, leaning into a **Soft Minimalism** style. 

The aesthetic prioritizes intentionality over density. By utilizing generous whitespace and a "tactile-digital" approach, the UI mirrors the physical experience of handling high-quality natural fibers. The goal is to evoke a sense of warmth and professional craftsmanship, ensuring the user feels unhurried and inspired. Visual elements should feel "lifted" and soft, avoiding harsh geometric intersections in favor of organic flow.

## Colors

The palette is derived from natural dyes and organic materials. 

- **Primary (Sage Green):** Used for growth, tranquility, and primary actions. It represents the botanical inspiration behind many designs.
- **Secondary (Warm Terracotta):** Used sparingly for accents, highlights, and secondary call-to-actions. It adds a grounding, earthy warmth.
- **Background (Oatmeal):** This is the canvas of the design system. It is used instead of pure white to reduce eye strain and provide a "linen-like" backdrop.
- **Typography (Deep Charcoal):** A soft black (#2F2F2F) used to maintain high legibility without the clinical harshness of #000000.

## Typography

The typography strategy relies on the contrast between the heritage-rich **Playfair Display** and the modern, geometric **Montserrat**.

- **Headers:** Use Playfair Display for all headings. The high-contrast strokes and elegant serifs communicate the "boutique" nature of the studio.
- **Body:** Montserrat provides a clean, breathable reading experience. A slightly increased line-height (1.6) is used to maintain a sense of airy openness.
- **Labels:** Small labels and overlines should use Montserrat in semi-bold with increased letter spacing to provide a structured, editorial feel.

## Layout & Spacing

The design system utilizes a **Fixed Grid** for desktop and a **Fluid Grid** for mobile devices. 

- **Desktop:** 12-column grid centered in a 1200px container. Margins are wide (64px) to allow the "Oatmeal" background to frame the content.
- **Mobile:** 4-column grid with 24px side margins. 
- **Rhythm:** An 8px base unit drives all padding and margin decisions. For vertical rhythm between sections, use large increments (80px, 120px) to maintain the minimalist, uncrowded aesthetic.

## Elevation & Depth

To simulate the softness of crochet and yarn, this design system avoids harsh shadows. Instead, it uses **Ambient Shadows** that are extra-diffused.

- **Soft Depth:** Shadows should have a large blur radius (20px+) and low opacity (5-8%). Use a slight tint of the secondary or neutral color in the shadow to keep it from looking "dirty."
- **Tonal Layering:** Depth is also achieved by layering Oatmeal against slightly lighter/darker variations of the Sage Green palette to create subtle visual separation without physical shadows.
- **Interactions:** On hover, elements should lift slightly (translate -4px) and the shadow should become more diffused, mimicking a tactile pick-up.

## Shapes

The shape language is defined by **Rounded** geometry. There are no sharp 90-degree corners in this design system.

- **Standard Elements:** Buttons and input fields use a 0.5rem (8px) radius.
- **Large Elements:** Cards and image containers use 1rem (16px) or 1.5rem (24px) to feel substantial yet soft.
- **Iconography:** Icons should feature rounded caps and corners to match the typography and UI components.

## Components

- **Buttons:** Primary buttons are Sage Green with white or deep charcoal text. They should have a subtle 1px border of a darker sage to provide definition. No fully-pill shapes; stick to the "Rounded" (8px) standard.
- **Cards:** Cards should have a "Soft Depth" shadow. Use the Oatmeal background for the card face to maintain a monochrome, sophisticated look.
- **Input Fields:** Use a thin 1px border in a muted sage or warm grey. Focus states should transition the border to the primary Sage Green with a very soft outer glow.
- **Chips/Tags:** Used for "Yarn Type" or "Difficulty Level." These should have a Warm Terracotta background with a low opacity (15%) to act as a soft color wash, paired with full-strength Terracotta text.
- **Lists:** Use custom crochet-hook icons or simple organic dots as bullets. Maintain generous vertical padding between list items to prevent a cluttered feel.
- **Specialty Component (Pattern Progress):** A custom horizontal progress bar using a "stitched" line texture to indicate completion of a crochet pattern.