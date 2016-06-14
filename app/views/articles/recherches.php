<div class="articles">

    <?php foreach ($articles as $article): ?>
       <p><?= $article->nom ?></p>
        <p><?= $article->type ?></p>
    <?php endforeach; ?>
</div>

<table class="u-full-width">
    <thead>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Sex</th>
        <th>Location</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Dave Gamache</td>
        <td>26</td>
        <td>Male</td>
        <td>San Francisco</td>
    </tr>
    <tr>
        <td>Dwayne Johnson</td>
        <td>42</td>
        <td>Male</td>
        <td>Hayward</td>
    </tr>
    </tbody>
</table>