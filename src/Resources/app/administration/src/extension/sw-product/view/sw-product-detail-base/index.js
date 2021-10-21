import template from './sw-product-detail-base.html.twig';

const { Component, Context } = Shopware;
const { mapState, mapGetters } = Component.getComponentHelper();

Component.override('sw-product-detail-base', {
    template,

    inject: ['repositoryFactory'],

    computed: {
        ...mapState('swProductDetail', [
            'product',
            'parentProduct',
        ]),

        ...mapGetters('swProductDetail', [
            'isLoading',
        ]),

        OTOEIDRepository() {
            return this.repositoryFactory.create('one_to_one_extension_inheritance_demo');
        },

        // OneToOneExtensionInheritanceDemoExtension and parentOneToOneExtensionInheritanceDemoExtension() are not
        // necessary depending on what I put in my v-model and :inherited-value.
        // See comment in ./sw-product-detail-base.html.twig
        OneToOneExtensionInheritanceDemoExtension: {
            get: function() {
                if (this.product && this.product.extensions && this.product.extensions['oneToOneExtensionInheritanceDemo']) {
                    return this.product.extensions['oneToOneExtensionInheritanceDemo']['myDate'];
                }

                return null;
            },
            set: function(value) {
                this.$set(this.product.extensions['oneToOneExtensionInheritanceDemo'], 'myDate', value);
            }
        },

        parentOneToOneExtensionInheritanceDemoExtension() {
            if (this.parentProduct && this.parentProduct.extensions && this.parentProduct.extensions['oneToOneExtensionInheritanceDemo']) {
                return this.parentProduct.extensions['oneToOneExtensionInheritanceDemo']['myDate']
            }

            return null;
        },
    },
    watch: {
        product() {
            this.initExtension();
        }
    },
    methods: {
        initExtension() {
            if (this.product.extensions && !this.product.extensions['oneToOneExtensionInheritanceDemo']) {
                let newEntity = this.OTOEIDRepository.create(Context.api);
                newEntity.myDate = null;
                this.$set(this.product.extensions, 'oneToOneExtensionInheritanceDemo', newEntity);
            }
        }
    },
});
