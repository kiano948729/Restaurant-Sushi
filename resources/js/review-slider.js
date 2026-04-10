export default function reviewSlider() {
    return {
        current: 0,
        total: 0,
        interval: null,

        init(totalItems) {
            this.total = totalItems;
            this.start();
        },

        start() {
            this.interval = setInterval(() => {
                this.next();
            }, 4000);
        },

        pause() {
            clearInterval(this.interval);
        },

        next() {
            this.current = (this.current + 1) % this.total;
        },

        prev() {
            this.current = (this.current - 1 + this.total) % this.total;
        },

        goTo(index) {
            this.current = index;
        }
    }
}