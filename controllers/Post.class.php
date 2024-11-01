<?php class Post extends Controller
{

    public function index()
    {
        $postModel = $this->loadModel('PostModel');
        $posts = $postModel->getAll();
        $this->loadView('posts', ['posts' => $posts]);
    }

    public function create()
    {
        $this->loadView('insert');
    }

    public function create_process()
    {
        $postModel = $this->loadModel('PostModel');
        $title = $_POST['title'];
        $content = $_POST['content'];

        $postModel->insert($title, $content);
        header('Location: ?c=Post');
    }

    public function edit()
    {
        $id = $_GET['id'];

        if (!$id)
            header('Location: index.php?c=Post');

        $postModel = $this->loadModel('PostModel');
        $post = $postModel->getById($id);

        if (!$post->num_rows)
            header('Location: index.php?c=Post');

        $this->loadView('edit', ['post' => $post->fetch_object()]);
    }

    public function edit_process()
    {
        $postModel = $this->loadModel('PostModel');
        $id = $_POST['id'];
        $title = addslashes($_POST['title']);
        $content = addslashes($_POST['content']);

        $postModel->update($id, $title, $content);

        header('Location: ?c=Post');
    }

    public function delete()
    {
        $id = $_POST['id'];
        $postModel = $this->loadModel('PostModel');

        $postModel->delete($id);
        header('Location: ?c=Post');
    }

}