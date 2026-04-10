import './bootstrap';
import reviewSlider from './review-slider'

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.data('reviewSlider', reviewSlider)

Alpine.start();
