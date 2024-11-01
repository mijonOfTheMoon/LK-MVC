<?php class PostModel extends Model
{

    public function getAll()
    {
        $sql = 'SELECT * FROM post';

        return $this->mysqli->query($sql);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM post WHERE id = $id";

        return $this->mysqli->query($sql);
    }

    public function insert($title, $content)
    {
        $sql = "INSERT INTO post (title, content) VALUES ('$title', '$content')";

        $this->mysqli->query($sql);
    }

    public function update($id, $title, $content)
    {
        $sql = "UPDATE post SET title = '$title', content = '$content' WHERE id = $id";

        $this->mysqli->query($sql);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM post WHERE id = $id";

        $this->mysqli->query($sql);
    }

}