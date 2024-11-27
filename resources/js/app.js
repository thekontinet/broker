import './bootstrap';

import Alpine from 'alpinejs';
import Gsap from 'gsap'
import scrollTrigger from 'gsap/ScrollTrigger'

Gsap.registerPlugin(scrollTrigger)
window.Alpine = Alpine;
window.Gsap = Gsap;

Alpine.start();
