<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    
</nav>
<body>
<div class="users form large-9 medium-8 columns content">
<h2>Kevin Fafard</h2>
<p>420-5B7-MO , Automne 2018 , Collège Montmorency</p>
<h3>Ce qui a été complété</h3>
    <p>J'ai effectué tous le TP. Cependant, pour voir la liste lié il faut etre connecté. Aussi, pour la connexion avec le jeton, il fonctionne mais il dit constamment
    que les credentials sont pas bon. Ceci est causé par une différence avec les noms des champs de ma base de données. La liste lié est dans Customer Product
    et le CRUD est dans Types.</p>

<h3>Stratégie d'objectifs</h3>
 <p>Pour un site web de vente de produit, il est important de s'assurer de la sécurité et l'efficacité du site Web. Il faut que chaque page puisse être accédé
 seulement pas les personnes qui en ont le droit. Par exemple, un client ne devrait pas pouvoir ajouter de produits. L'objectif principal est cependant la convivalité
 du site Web. Il doit être navigable efficacement et simplement. Cake nous a permis de le faire très facilement heureusement. Les critères opérationnelles seraient 
 donc: Facilité d'utilisation, sécuritaire et naviaguation efficace.</p>

 <h3>Stratégie de cible</h3>
 <p>Le site que j'ai concu s'adresse davantage a de la clientère commune. Par exemple, des personnes qui cherchent des produits spécifique à commander. Le site
 en tant que tel pourrait intéressé des petites entreprises qui cherche à prendre de l'ampleur sur le web. Les personnes utilisant ce site pourrait aussi 
 être des acheteurs pour de grandes compagnies.</p>

<h3>Diagramme BD</h3>
<?php echo $this->Html->image('bd.jpg', ['alt' => 'Base de données']); ?>

<h3><a href="http://www.databaseanswers.org/data_models/customers_and_products/index.htm" >Lien vers la BD de référence</a></h3>


</div>
</body>