const items = [
    {
        position: 0,
        el: document.getElementById('carousel-item-0')
    },
    {
        position: 1,
        el: document.getElementById('carousel-item-1')
    },
    {
        position: 2,
        el: document.getElementById('carousel-item-2')
    },
    {
        position: 3,
        el: document.getElementById('carousel-item-3')
    },
    {
        position: 4,
        el: document.getElementById('carousel-item-4')
    },
    {
        position: 5,
        el: document.getElementById('carousel-item-5')
    },
    {
        position: 6,
        el: document.getElementById('carousel-item-6')
    },
    {
        position: 7,
        el: document.getElementById('carousel-item-7')
    },
    {
        position: 8,
        el: document.getElementById('carousel-item-8')
    },
    {
        position: 9,
        el: document.getElementById('carousel-item-9')
    },
];

const options = {
    activeItemPosition: 1,
    interval: 3000,
    
    indicators: {
        activeClasses: 'bg-white dark:bg-gray-800',
        inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
        items: [
            {
                position: 0,
                el: document.getElementById('carousel-item-0')
            },
            {
                position: 1,
                el: document.getElementById('carousel-item-1')
            },
            {
                position: 2,
                el: document.getElementById('carousel-item-2')
            },
            {
                position: 3,
                el: document.getElementById('carousel-item-3')
            },
            {
                position: 4,
                el: document.getElementById('carousel-item-4')
            },
            {
                position: 5,
                el: document.getElementById('carousel-item-5')
            },
            {
                position: 6,
                el: document.getElementById('carousel-item-6')
            },
            {
                position: 7,
                el: document.getElementById('carousel-item-7')
            },
            {
                position: 8,
                el: document.getElementById('carousel-item-8')
            },
            {
                position: 9,
                el: document.getElementById('carousel-item-9')
            },
        ]
    },
    
    // callback functions
    onNext: () => {
        console.log('next slider item is shown');
    },
    onPrev: ( ) => {
        console.log('previous slider item is shown');
    },
    onChange: ( ) => {
        console.log('new slider item has been shown');
    }
};