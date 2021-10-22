# Shopware6OneToOneExtensionInheritanceDemo
This repository is supposed to reproduce the missing extensions for variant products using the OneToOneAssociation.

## The background

### ```{{ dump(product) }}``` of a (parent) product in any storefront template
- Adding, editing and saving extensions for a (parent) product works without a problem.
![This is the extensions part of dump(product) of a (parent) product in the storefront](https://imgur.com/lg8lKcI)

### ```{{ dump(product) }}``` of a variant product in any storefront template
- The variant product of a parent product does NOT inherit the extension from the parent. It will always be null.
![This is the extensions part of dump(product) of a variant product in the storefront](https://imgur.com/3TDdi1l)

### ```{{ product.extensions }}``` and ```{{ parentProduct.extensions }}``` for our (parent) product in our extra admin card.
![This is the extensions part of {{ product.extensions }} and {{ parentProduct.extensions }} of a product in the admin](https://imgur.com/3TDdi1l)

### ```{{ product.extensions }}``` and ```{{ parentProduct.extensions }}``` for our variant product in our extra admin card.
![This is the extensions part of {{ product.extensions }} and {{ parentProduct.extensions }} of a variant product in the admin](https://imgur.com/3TDdi1l)
    
- Lifting the inheritance and then adding/editing/saving an extension in the admin manually works and the variant gets its own entry in the database.

- Restoring the inheritance of a variant in admin does not restore the parents values and does not remove the corresponding entry in the database.
