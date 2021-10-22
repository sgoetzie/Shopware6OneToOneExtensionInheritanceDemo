# Link to the issue on shopware/platform
### [Issue#2150](https://github.com/shopware/platform/issues/2150)

# Shopware6OneToOneExtensionInheritanceDemo
This repository is supposed to reproduce the missing extensions for variant products using the OneToOneAssociation.

## The background

### ```{{ dump(product) }}``` of a (parent) product in any storefront template
- Adding, editing and saving extensions for a (parent) product works without a problem.

![This is the extensions part of dump(product) of a (parent) product in the storefront](https://i.imgur.com/lg8lKcI.png)

### ```{{ dump(product) }}``` of a variant product in any storefront template
- The variant product of a parent product does NOT inherit the extension from the parent. It will always be null.

![This is the extensions part of dump(product) of a variant product in the storefront](https://i.imgur.com/3TDdi1l.png)

### ```{{ product.extensions }}``` and ```{{ parentProduct.extensions }}``` for our (parent) product in our extra admin card.
- The (parent) products values are saved correctly and accessible.

![This is the extensions part of {{ product.extensions }} and {{ parentProduct.extensions }} of a product in the admin](https://i.imgur.com/cAe5lbr.png)

### ```{{ product.extensions }}``` and ```{{ parentProduct.extensions }}``` for our variant product in our extra admin card.
- The variant product seems to know about his parent and its values.

![This is the extensions part of {{ product.extensions }} and {{ parentProduct.extensions }} of a variant product in the admin](https://i.imgur.com/ZjH3W8r.png)
    
- Lifting the inheritance and then adding/editing/saving an extension in the admin manually works and the variant gets its own entry in the database. The seperate entry for this variant will become accessible in the storefront and potential filters can use this value.

- Restoring the inheritance of a variant in admin does not restore the parents values and does not remove the corresponding entry in the database. The variant will now have an entry in the database with it's value set to null. The extension remains accessible and will be used by potential filters.


# Links to posts with the same or a similar problem

## German posts

### Shopware Forum

- https://forum.shopware.com/t/keine-inheritance-mit-einer-onetoone-entityextension-des-produkts-moeglich/90215
- https://forum.shopware.com/t/produkt-um-vererbbares-boolean-feld-erweitern/89149
- https://forum.shopware.com/t/vererbung-einer-custom-assoziation/64871

## English posts

### Shopware Forum

- https://forum.shopware.com/t/inheritable-boolean-field-for-product-entity/89200

### GitHub

- https://github.com/shopware/platform/issues/2015#issuecomment-907696840

### Stackoverflow

- https://stackoverflow.com/questions/67820918/shopware-6-create-inherited-entity-extension-for-products
- https://stackoverflow.com/questions/64373238/how-to-use-inherited-flag-in-shopware-6-for-onetooneassociationfield

### Slack

- https://app.slack.com/client/T011TTK0DMK/C011VFQT7GB/thread/C011VFQT7GB-1634805683.017100
