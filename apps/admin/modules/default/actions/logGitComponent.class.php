<?php

class logGitComponent extends sfComponent
{
  const DISPLAY_COUNT = 15;

  /**
   * @param sfWebRequest $request
   * @return void
   */
  public function execute($request)
  {
    $nbLog = $request->getParameter('gitlog', self::DISPLAY_COUNT);

    $this->logs = LogGitQuery::create()
      ->orderById(Criteria::ASC)
      ->limit($nbLog)
      ->find()
    ;

    $this->moreLogs = $nbLog + self::DISPLAY_COUNT;
  }
}
