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
    <p>J'ai effectué la lecture, la suppression, l'ajout et la modification en Ajax avec l'index de Type. Les tests du controller 
    ont été effectués avec la table Customer et les tests du model avec un findActif avec la table Products.
    La liste lié est dans le add de customer-product. Le autocomplete est dans le add et le edit de la table Type.
    Le bootrap est loadé dans chacune de mes pages et le pdf se fait avec la table Products.</p>
<h3>Ce qui ne fonctionne pas</h3>
 <p>Je n'ai pas fait l'interface avec préfixe de routage "Admin". </p>
	
<h3>Diagramme BD</h3>
<?php echo $this->Html->image('bd.jpg', ['alt' => 'Base de données']); ?>

<h3><a href="http://www.databaseanswers.org/data_models/customers_and_products/index.htm" >Lien vers la BD de référence</a></h3>

<h3><a href="/CustomersAndProducts/webroot/coverage/index.html">Lien vers le coverage</a></h3>

</div>
</body>