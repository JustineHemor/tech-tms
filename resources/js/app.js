import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
// import Choices from 'choices.js';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();


// window.choices = (element) => {
//     return new Choices(element,{
//         searchEnabled: true,
//         focusState: 'is-focused',
//         duplicateItemsAllowed: false,
//         maxItemCount: -1,
//         removeItemButton: false,
//         position: 'auto',
//         placeholder: true,
//         placeholderValue: 'Please Select Choices',
//     });
// }
