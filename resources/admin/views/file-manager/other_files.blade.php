<div class="file-manager-wrapper" x-data="fileManager" :class="{ 'full-page': $store.page.full_page }">
    @include('admin::file-manager.header')
    <div class="file-manager-body">
        <div class="breadcrumb">
            <span @click="firstPage()">
                @lang('file-manager.breadcrumb.other_files')
            </span>
        </div>
        <div class="file-side">
            @include('admin::file-manager.menu')
            <div class="file-list" *ngIf="!store?.fileLoading && store?.dataFile?.length > 0">
                <div class="action">
                    <div class="form-row">
                        <input type="text" placeholder="@lang('file-manager.input.search')" x-on:input="onSearch($event)">
                        <i data-feather="search"></i>
                    </div>
                    <button @click="reloadPage()" class="reload">
                        <i data-feather="refresh-cw"></i>
                        <span>@lang('file-manager.button.reload')</span>
                    </button>
                </div>
                <div class="file-list-wrapper" x-on:scroll="onScroll($event)">
                    <template x-if="!loading && files.length > 0">
                        <div class="file-row">
                            <template x-for="(file,index) in files">
                                <div class="file-item" x-bind:class="isSelected(file, 'selected')"
                                    x-on:contextmenu="onRightClick($event,file,'file')"
                                    x-on:mousemove="showTooltip($event,file)" x-on:mouseleave="hideTooltip()"
                                    @click="onSelectFiles(file)" x-on:dblclick="viewImage(file)">
                                    <template x-if="file?.is_image != 0">
                                        <div class="img is-image">
                                            <img x-bind:src="base_path + file?.path"
                                                onerror="(this).src='{{ asset('images/logo/default.png') }}'"
                                                alt="">
                                        </div>
                                    </template>
                                    <template x-if="file?.is_image == 0">
                                        <div class="img">
                                            <img x-bind:src="`{{ asset('images/logo/extensions') }}/${file?.extension}.png`"
                                                alt="" x-on:error="onImageError($event,file)">
                                        </div>
                                    </template>
                                    <div class="name">
                                        <span x-text="file?.name"></span>
                                    </div>
                                    <template x-if="!isSelected(file)">
                                        <div class="select-file-icon">
                                            {{-- <i data-feather="circle"></i> --}}
                                            <div></div>
                                        </div>
                                    </template>
                                    <template x-if="isSelected(file)">
                                        <div class="selected-file-icon">
                                            {{-- <i data-feather="check-circle"></i> --}}
                                            <div x-text="selectedIndex(file)"></div>
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </template>
                    <template x-if="!loading && files.length == 0">
                        @component('admin::components.empty',
                            ['name' => 'File not found', 'image' => asset('images/logo/em.svg'), 'style' => 'padding: 50px 0;'])
                        @endcomponent
                    </template>
                    <template x-if="loading || fileLoading">
                        <div class="skeleton-row">
                            <template x-for="skeleton in skeletons">
                                <div class="skeleton-item">
                                    <div class="img skeleton"></div>
                                    <div class="name skeleton"></div>
                                    <div class="name skeleton"></div>
                                </div>
                            </template>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
    <div class="file-manager-footer">
        <template x-if="selected_file.length > 0">
            <div class="file-manager-button">
                <button @click="onUnselectFiles">
                    <i data-feather="x"></i>
                    <span>@lang('file-manager.button.unselect_files')</span>
                </button>
                @if (!request()->is('*/file-manager/*'))
                    <button class="save" @click="onChooseFiles">
                        <i data-feather="check"></i>
                        <span>
                            @lang('file-manager.button.choose_files')
                            <span x-text="`(${selected_file.length})`"></span>
                        </span>
                    </button>
                @endIf
            </div>
        </template>
    </div>
    <template x-if="dialog.component.createFolderDialog">
        @include('admin::file-manager.create-folder')
    </template>
    <template x-if="dialog.component.renameFolderDialog">
        @include('admin::file-manager.rename-folder')
    </template>
    <template x-if="dialog.component.uploadFileDialog">
        @include('admin::file-manager.upload-file')
    </template>
    <template x-if="dialog.component.confirmDialog">
        @include('admin::file-manager.trash-dialog')
    </template>
    <template x-if="contentMenu.show">
        <div class="dialog">
            <div class="context-menu" :style="`top:${contentMenu.y}px;left:${contentMenu.x}px`">
                <div class="context-menu-item"
                    @click="viewImage(contentMenu?.data)"
                    @click.away="closeContextMenu">
                    <span>@lang('file-manager.button.open')</span>
                    <i data-feather="arrow-right"></i>
                </div>
                <template x-if="contentMenu.type === 'folder'">
                    <div class="context-menu-item" @click="dialog.open('renameFolderDialog')"
                        @click.away="closeContextMenu">
                        <span>@lang('file-manager.button.rename')</span>
                        <i data-feather="edit"></i>
                    </div>
                </template>
                <template x-if="contentMenu.type === 'file'">
                    <div class="context-menu-item" @click="copyLink(contentMenu?.data)"
                        @click.away="closeContextMenu">
                        <span>@lang('file-manager.button.copy-link')</span>
                        <i data-feather="link"></i>
                    </div>
                </template>
                <div class="context-menu-item danger" @click="dialog.open('confirmDialog')"
                    @click.away="closeContextMenu">
                    <span>@lang('file-manager.button.delete')</span>
                    <i data-feather="trash-2"></i>
                </div>
            </div>
        </div>
    </template>
    <template x-if="tooltip.show && !contentMenu.show">
        <div class="tooltipX" :style="`top:${tooltip.y}px;left:${tooltip.x}px`">
            <p>@lang('file-manager.tooltip.name') : <span x-text="tooltip.data?.name"></span></p>
            <p style="display: none" x-show="typeof tooltip.data?.folder_id != 'undefined'">
                @lang('file-manager.tooltip.size') : <span x-text="new Intl.NumberFormat().format(tooltip.data?.size)+' bytes'"></span>
            </p>
            <p style="display: none" x-show="tooltip.data?.is_image == 1">@lang('file-manager.tooltip.dimensions') :
                <span x-text="tooltip.data?.width+' x '+tooltip.data?.height"></span>
            </p>
            <p style="display: none" x-show="typeof tooltip.data?.folder_id != 'undefined'">
                @lang('file-manager.tooltip.type') : <span x-text="tooltip.data?.extension?.toUpperCase()"></span></p>
            <p style="display: none" x-show="typeof tooltip.data?.folder_id != 'undefined'">
                @lang('file-manager.tooltip.uploaded_at') : <span x-text="moment(tooltip.data?.created_at).calendar()"></span></p>
            <template x-if="typeof tooltip.data?.folder_id == 'undefined'">
                <p>@lang('file-manager.tooltip.created_at') : <span x-text="moment(tooltip.data?.created_at).calendar()"></span></p>
            </template>
        </div>
    </template>
    <script type="module">
        Alpine.data('fileManager', () => ({
            files: [],
            filePage: 1,
            base_path: '',
            loading: false,
            fileLoading: false,
            selected_file: [],
            delayQuery: null,
            currentParams: {},
            lastScrollTarget: 0,
            skeletons: new Array(10),
            contentMenu: {
                element: null,
                show: false,
                x: 0,
                y: 0,
                data: null
            },
            delayTooltip: null,
            tooltip: {
                show: false,
                x: 0,
                y: 0,
                data: null
            },
            options: {
                multiple: false,
            },
            init() {
                this.options.multiple = Alpine.store('page').options.multiple;
                this.reloadIcon();
                this.firstPage();
                this.dialog.initData(this);
            },
            getData(params = {}) {
                this.filePage = 1;
                this.loading = true;
                this.currentParams = params;
                Axios
                    .get(`{{ route('admin-file-manager-other') }}`, {
                        params: params
                    })
                    .then((data) => {
                        this.filePage += 1;
                        this.files = data.data.files.data;
                        this.base_path = data.data.base_path;
                    })
                    .then(() => {
                        this.lastScrollTarget = 0;
                        this.loading = false;
                        this.reloadIcon();
                    });
            },
            getFile(params = {}, next) {
                this.fileLoading = true;
                Axios
                    .get(`{{ route('admin-file-manager-other') }}`, {
                        params: params
                    })
                    .then((data) => {
                        this.files.push(...data.data.files.data);
                    })
                    .then(() => {
                        next();
                        this.fileLoading = false;
                        this.reloadIcon();
                    });
            },
            firstPage() {
                this.resetBreadcrumb();
                this.getData();
            },
            reloadPage() {
                if (this.currentParams.page) delete this.currentParams.page;
                this.getData(this.currentParams);
            },
            onScroll(el, offset_bottom = 0) {
                let target = el.target;
                let scroll = target.scrollTop;
                let scrollTarget = (target.scrollHeight - target.clientHeight) - offset_bottom;
                if (scrollTarget > this.lastScrollTarget && scroll >= scrollTarget) {
                    if (!this.loading && !this.fileLoading && this.files.length > 0) {
                        this.lastScrollTarget = scrollTarget;
                        this.getFile({
                            ...this.currentParams,
                            page: this.filePage,
                        }, () => {
                            this.filePage += 1;
                        });
                    }
                }
            },
            onSearch(e) {
                this.loading = true;
                clearTimeout(this.delayQuery);
                this.delayQuery = setTimeout(this.getData({
                    q: e?.target?.value ?? '',
                }), 500);
            },
            viewImage(file) {
                Fancybox.show([{
                    src: this.base_path + file.path,
                    type: file.is_image ? "image" : "iframe",
                }]);
            },
            onImageError(event, file) {
                const img = event.target;
                const {
                    clientHeight,
                    clientWidth
                } = img;
                img
                    .src =
                    `https://via.placeholder.com/${clientWidth}x${clientHeight}/eff3f5/4871f7?text=${file?.extension?.toUpperCase()}`;
            },
            resetBreadcrumb() {
                this.reloadIcon();
            },
            onClose() {
                Alpine.store('animate').leave(this.$refs.popupRef, (res) => {
                    Alpine.store('page').active = false;
                    Alpine.store('page').options.afterClose(false);
                    this.selected_file = [];
                    this.lastScrollTarget = 0;
                });
            },
            onChooseFiles() {
                Alpine.store('animate').leave(this.$refs.popupRef, (res) => {
                    Alpine.store('page').active = false;
                    Alpine.store('page').options.afterClose(this.selected_file, this.base_path);
                    this.selected_file = [];
                    this.lastScrollTarget = 0;
                });
            },
            onSelectFiles(file) {
                if (this.options.multiple) {
                    if (this.isSelected(file)) {
                        this.selected_file = this.selected_file.filter(item => item.id !== file.id);
                    } else {
                        this.selected_file.push(file);
                    }
                } else {
                    this.selected_file = [file];
                }
                this.reloadIcon();
            },
            onUnselectFiles() {
                this.selected_file = [];
                this.reloadIcon();
            },
            onRightClick(el, file, type) {
                el.preventDefault();
                let item = el.target;
                const currentOffset = item.closest('.file-item') ?? item.closest('.folder-item') ?? el.target;
                currentOffset.style.width = currentOffset.clientWidth + 'px';
                currentOffset.style.height = currentOffset.clientHeight + 'px';
                currentOffset.style.position = 'relative';
                currentOffset.style.zIndex = '9999999';
                currentOffset.style.background = "#ffffff";
                const {
                    top,
                    left
                } = this.offset(currentOffset);
                let positionX = left + currentOffset.clientWidth + 10;
                positionX = positionX + 180 > document.body.clientWidth ? left - 180 - 10 :
                    positionX;
                this.contentMenu = {
                    element: currentOffset,
                    show: true,
                    x: positionX,
                    y: top,
                    data: file,
                    type: type
                };
                this.reloadIcon();
            },
            offset(el) {
                var rect = el.getBoundingClientRect(),
                    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
                    scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                return {
                    top: rect.top + scrollTop,
                    left: rect.left + scrollLeft
                }
            },
            closeContextMenu() {
                this.contentMenu.element?.removeAttribute('style');
                this.contentMenu = {
                    element: null,
                    show: false,
                    x: 0,
                    y: 0,
                    data: null
                };
            },
            copyLink(file) {
                this.closeContextMenu();
                let text = this.base_path + file.path;
                let el = document.createElement('textarea');
                el.value = text;
                el.setAttribute('readonly', '');
                el.style.position = 'absolute';
                el.style.left = '-9999px';
                document.body.appendChild(el);
                el.select();
                document.execCommand('copy');
                document.body.removeChild(el);
            },
            showTooltip(el, file) {
                this.tooltip.show = false;
                clearTimeout(this.delayTooltip);
                this.delayTooltip = setTimeout(() => {
                    this.tooltip = {
                        show: true,
                        x: el.clientX + 10,
                        y: el.clientY + 10,
                        data: file,
                    };
                }, 1000);
            },
            hideTooltip() {
                clearTimeout(this.delayTooltip);
                this.tooltip = {
                    show: false,
                    x: 0,
                    y: 0,
                    data: null,
                };
            },
            isSelected(file, call_back) {
                return this.selected_file.find(item => item.id == file.id) ? call_back ?? true : false;
            },
            selectedIndex(file) {
                return this.selected_file.findIndex(item => item.id == file.id) + 1;
            },
            reloadIcon() {
                feather.replace();
                setTimeout(() => {
                    feather.replace();
                }, 10);
            },
            dialog: {
                rootData: null,
                initData(root) {
                    this.rootData = root;
                },
                component: {
                    createFolderDialog: false,
                    uploadFileDialog: false,
                    renameFolderDialog: false,
                    confirmDialog: false
                },
                data: {
                    createFolderDialog: {},
                    uploadFileDialog: {},
                    renameFolderDialog: {},
                    confirmDialog: {}
                },
                open(dialogRef) {
                    this.component[dialogRef] = true;
                    this.data[dialogRef] = this.rootData;
                },
                close(dialogRef, data) {
                    this.component[dialogRef] = false;
                    if (data) {
                        this.rootData.getData({
                            folder_id: null
                        });
                    }
                },
            }
        }));
    </script>
</div>
