<?php
$this->title = 'Адміністрування';

use Models\Users;

$users = Users::find_all_users();
?>
<h1>Керування користувачами</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Логін</th>
            <th>Ім'я</th>
            <th>Прізвище</th>
            <th>Адмін</th>
            <th>Видавець</th>
            <th>Дії</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user->id); ?></td>
                <td><?php echo htmlspecialchars($user->login); ?></td>
                <td><?php echo htmlspecialchars($user->firstname); ?></td>
                <td><?php echo htmlspecialchars($user->lastname); ?></td>
                <td><?php echo $user->is_admin ? 'Так' : 'Ні'; ?></td>
                <td><?php echo $user->is_publisher ? 'Так' : 'Ні'; ?></td>
                <td>
                    <form method="post" action="">
                        <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user->id); ?>">
                        <label>
                            <input type="checkbox" name="is_admin" <?php if ($user->is_admin) echo 'checked'; ?>> Адмін
                        </label>
                        <label>
                            <input type="checkbox" name="is_publisher" <?php if ($user->is_publisher) echo 'checked'; ?>> Видавець
                        </label>
                        <button type="submit">Зберегти</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>