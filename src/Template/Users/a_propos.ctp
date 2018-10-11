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
    <p>J'ai réussi à tout faire sauf pour ce qui est de l'envoi de courriel. De plus, comme expliqué plus bas, je n'ai pas fait toute les sécurisations
    pour le controller utilisateur. Juste vous mentionner aussi que ma traduction a été faite avant la création de ma table File puisque j'ai fais
    le travail dans l'ordre des consignes. Merci de votre compréhension. Vous pouvez aussi observer mes nombreux commit sur mon github puisque
    j'utilise énormément ce programme de gestion de code.</p>
<h3>Utilisateur régulier</h3>
 <p>Vous créer un nouvel utilisateur. Vous pouvez seulement voir tous les views et créer une commande de produits. Ce qui n'a pas été fait est
 la gestion afin de voir aucun utilisateur. </p>
 
<h3>Super-Utilisateur</h3>

	<p>Afin de créer un super utilisateur, il ne faut que simplement avoir le mot vendeur dans le courriel a un endroit. C'est
        une méthode très peu fiable mais je vous en avait parlé en classe et pour le TP1 c'était assez. Celui-ci, contrairement aux utilisateurs
        réguliers, peut créer des produits.
    </p>
	
<h3>Admin</h3>
	<p>
        Fonctionne de la même façon que les super-utilisateur, il ne faut qu'avoir admin dans le courriel.
    </p>
	
<h3>Diagramme BD</h3>
<?php echo $this->Html->image('bd.jpg', ['alt' => 'Base de données']); ?>

<h3><a href="http://www.databaseanswers.org/data_models/customers_and_products/index.htm" >Lien vers la BD de référence</a></h3>

</div>
</body>