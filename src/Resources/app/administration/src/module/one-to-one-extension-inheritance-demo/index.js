import enGB from './snippet/en-GB.json';

const { Module } = Shopware;

Module.register('one-to-one-extension-inheritance-demo', {
    type: 'plugin',
    name: 'OneToOneExtensionInheritanceDemo',

    snippets: {
        'en-GB': enGB
    },
});