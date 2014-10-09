<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

/**
 * Class UserPresenter
 */
class UserPresenter extends Presenter {

    /**
     * Present a link to the user's gravatar
     *
     * @param $size
     * @return string
     */
    public function gravatar($size = 30)
	{
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";
	}

}