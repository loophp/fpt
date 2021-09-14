<?php

/**
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

declare(strict_types=1);

namespace loophp\fpt\Psalm\EventHandler\ComposeSimple;

use PhpParser\Node;
use PhpParser\Node\FunctionLike;
use PhpParser\NodeTraverser;
use PhpParser\NodeVisitorAbstract;
use Psalm\Internal\Analyzer\MethodAnalyzer;
use Psalm\Plugin\EventHandler\AfterFunctionLikeAnalysisInterface;
use Psalm\Plugin\EventHandler\Event\AfterFunctionLikeAnalysisEvent;

final class AfterExpressionAnalysisProvider implements AfterFunctionLikeAnalysisInterface
{

    public static function afterStatementAnalysis(AfterFunctionLikeAnalysisEvent $event): ?bool {
        $stmtSource = $event->getStatementsSource();

        if (false === ($stmtSource instanceof MethodAnalyzer)) {
            return false;
        }

        if ('of' !== $stmtSource->getMethodName()) {
            return false;
        }

        $ast = $event->getStmt();

        if (false === ($ast instanceof FunctionLike)) {
            return false;
        }

        $closure = self::getNextClosure($ast);

        // This is the $fs param of ComposeSimple::of()(callable ...$fs);
        // ----------------------------------------------------------^
        $param = current($closure->getParams());

        // Questions
        // 1. What to do from there?

        return true;
    }

    private static function getNextClosure($ast): Node\Expr\Closure
    {
        $traverser = new NodeTraverser();

        $traverser->addVisitor(new class extends NodeVisitorAbstract {
            public function enterNode(Node $node): ?Node\Stmt\Return_ {
                return $node instanceof Node\Stmt\Return_ ? $node : null;
            }
        });

        /** @var array<int, \PhpParser\Node\Stmt\Return_> $returnStatement */
        $returnStatement = $traverser->traverse($ast->getStmts());

        return current($returnStatement)->expr;
    }
}
