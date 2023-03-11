<template x-if="$store.{{ $dialog }}.show">
    <div x-data="{{ $dialog }}_component" x-bind:style="{ zIndex: $store.libs.getLastIndex() + 1 }" class="dialog {{ isset($center) ? 'center' : '' }}"
        x-bind:onload="dialogInit">
        <div class="dialog-wrapper">
            <div class="dialog-container" @click.away="$store.{{ $dialog }}.clickAway">
                {{ $slot }}
            </div>
        </div>
        <div class="dialog-cover" @click="$store.{{ $dialog }}.close()"></div>
    </div>
</template>
<script type="module">
    Alpine.data('{{ $dialog }}_component', () => ({
        dialogInit() {
            let dialog = this.$store.{{ $dialog }};
            feather.replace();
            const target = this.$root.querySelector('.dialog-container');
            const firstChild = target.firstElementChild;
            firstChild.style.width = dialog.attributes?.width;
            firstChild.style.maxWidth = dialog.attributes?.width;
            firstChild.style.height = dialog.attributes?.height;
            firstChild.style.maxHeight = dialog.attributes?.height;
            this.$store.libs.playAnimateOnLoad(target, () => {
                if (dialog.backdrop) {
                    dialog.clickAway = () => {
                        dialog.close();
                    };
                }
            });
            dialog.target = target;
        }
    }));
    Alpine.store('{{ $dialog }}', {
        target: null,
        data: null,
        show: false,
        backdrop: false, // enable click away to close dialog
        attributes: {},
        clickAway: () => {},
        afterClosed: () => {},
        config(options) {
            const {
                backdrop,
                width,
                height,
            } = options;
            this.backdrop = backdrop ?? false;
            this.attributes = {
                width: width ?? '80vw',
                height: height
            }
        },
        open(options) {
            document.body.style.overflow = 'hidden';
            this.data = options?.data;
            this.afterClosed = options?.afterClosed ?? null;
            this.show = true;
        },
        close(data = null) {
            Alpine.store('animate').leave(this.target, () => {
                this.show = false;
                document.body.style.overflow = 'unset';
                if (typeof this.afterClosed === 'function') {
                    this.afterClosed(data);
                }
                this.clickAway = () => {};
            });
        },

        direct() {
            this.close();
        }
    });
</script>
