<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDG9w3a1\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDG9w3a1/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerDG9w3a1.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerDG9w3a1\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerDG9w3a1\App_KernelDevDebugContainer([
    'container.build_hash' => 'DG9w3a1',
    'container.build_id' => 'f1a43a1d',
    'container.build_time' => 1712312433,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDG9w3a1');
