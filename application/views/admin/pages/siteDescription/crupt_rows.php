<div class="container">
    <h2>Basic Table</h2>
    <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
    <table class="table">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach( $cruptRows as $rows ) { ?>

            <?php echo $rows ;?>
        <tr>
            <td>John</td>
            <td>Doe</td>
            <td>john@example.com</td>
        </tr>

        <?php } ?>

        </tbody>
    </table>
</div>
