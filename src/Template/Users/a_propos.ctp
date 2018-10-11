<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Authors'), ['controller' => 'Authors', 'action' => 'index']) ?></li>
    </ul>
</nav>
<body>
<div class="users form large-9 medium-8 columns content">
<h2>Kevin Fafard</h2>
<p>420-5B7-MO , Automne 2018 , Collège Montmorency</p>
<h3>Utilisateur régulier</h3>
 <p>Vous créer un nouvel utilisateur. Vous pouvez seulement voir la liste de livres et d'auteurs.</p>
 
<h3>Super-Utilisateur</h3>

	<p>Afin de créer un super utilisateur, il ne faut que simplement avoir le mot vendeur dans le courriel a un endroit. C'est
        une méthode très peu fiable mais je vous en avait parlé en classe et pour le TP1 c'était assez.
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