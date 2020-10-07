import inViewport from 'in-viewport';

const gaeClicks = document.querySelectorAll('[data-gae-click]');
const gaeShows = document.querySelectorAll('[data-gae-show]');
const links = document.querySelectorAll('a');

for (const gaeClick of gaeClicks) {
    gaeClick.addEventListener('click', gaeClickHandler);
}

for (const gaeShow of gaeShows) {
    gaeShowHandler(gaeShow);
}

for (const link of links) {
    if (link.href.indexOf(location.host) === -1 && link.href.match(/^http/i)) {
        link.addEventListener('click', linkClickHandler);
    }
}

function gaeClickHandler() {
    window.dataLayer.push({
        'event': 'GAE',
        'gae': {
            'category': element.dataset['gae-category'],
            'action': element.dataset['gae-action'],
            'label': element.dataset['gae-label'],
            'value': element.dataset['gae-value'],
        }
    });
}

function gaeShowHandler(gaeShow) {
    inViewport(gaeShow, function(element) {
        window.dataLayer.push({
            'event': 'GAE',
            'gae': {
                'category': element.getAttribute('data-gae-show'),
                'action': 'Show',
            }
        });
    });
}

function linkClickHandler(event) {
    window.dataLayer.push({
        'event': 'GAE',
        'gae': {
            'category': 'External link',
            'action': 'Click',
            'label': event.target.getAttribute('href'),
        }
    });
}
