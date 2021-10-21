const path = require('path');

module.exports = () => {
    return {
        resolve: {
            alias: {
                OneToOneExtensionInheritanceDemo: path.join(__dirname, '..', 'src')
            }
        }
    };
};
