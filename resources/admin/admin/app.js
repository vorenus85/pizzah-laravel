import './bootstrap.js';

function slugify(text) {
    return text
        .toString()
        .toLowerCase()
        .trim()
        .replace(/[\s\_]+/g, '-')       // szóköz vagy aláhúzás → kötőjel
        .replace(/[áàäâ]/g, 'a')
        .replace(/[éëèê]/g, 'e')
        .replace(/[íïìî]/g, 'i')
        .replace(/[óöòôő]/g, 'o')
        .replace(/[úüùûű]/g, 'u')
        .replace(/[^a-z0-9\-]/g, '')    // eltávolít mindent, ami nem betű, szám vagy kötőjel
        .replace(/\-\-+/g, '-');        // többszörös kötőjel → egy kötőjel
}

window.slugify = slugify;
