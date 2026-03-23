(function () {
    const passwordInput = document.getElementById('loginPassword');
    const togglePasswordButton = document.getElementById('togglePassword');
    const loginForm = document.getElementById('loginForm');
    const loginButton = document.getElementById('btnLogin');

    if (togglePasswordButton && passwordInput) {
        togglePasswordButton.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';
            passwordInput.type = isPassword ? 'text' : 'password';
            togglePasswordButton.innerHTML = `<i class="bi ${isPassword ? 'bi-eye-slash' : 'bi-eye'}"></i>`;
        });
    }

    if (loginForm && loginButton) {
        loginForm.addEventListener('submit', () => {
            if (window.NuboUI && typeof window.NuboUI.setButtonLoading === 'function') {
                window.NuboUI.setButtonLoading(loginButton, true);
            }
        });
    }

    const canvas = document.getElementById('nuboNetworkCanvas');
    if (!canvas) return;

    const context = canvas.getContext('2d');
    const visualPanel = canvas.parentElement;
    let width = 0;
    let height = 0;
    let animationFrame = null;
    let startTime = performance.now();

    const nodes = [
        { x: -120, y: -40, radius: 12, phase: 0.1 },
        { x: -46, y: -88, radius: 13, phase: 0.45 },
        { x: 62, y: -8, radius: 11, phase: 0.75 },
        { x: 8, y: 88, radius: 10, phase: 1.1 },
        { x: -80, y: 62, radius: 11, phase: 1.5 }
    ];

    const links = [
        [0, 1],
        [1, 2],
        [2, 3],
        [3, 4],
        [4, 0],
        [1, 3]
    ];

    const orbitSeed = nodes.map((node, index) => ({
        angle: Math.PI * 2 * (index / nodes.length),
        distance: 120 + (index * 18)
    }));

    function resizeCanvas() {
        width = visualPanel.clientWidth;
        height = visualPanel.clientHeight;
        canvas.width = width * window.devicePixelRatio;
        canvas.height = height * window.devicePixelRatio;
        canvas.style.width = `${width}px`;
        canvas.style.height = `${height}px`;
        context.setTransform(window.devicePixelRatio, 0, 0, window.devicePixelRatio, 0, 0);
    }

    function getCenter() {
        return {
            x: width * 0.5,
            y: height * 0.42
        };
    }

    function drawCloud(center, alpha) {
        context.save();
        context.lineWidth = 2.4;
        context.strokeStyle = `rgba(255,255,255,${Math.min(0.35, alpha)})`;
        context.setLineDash([6, 8]);
        context.globalAlpha = 0.48;
        context.beginPath();
        context.arc(center.x, center.y, Math.min(width, height) * 0.23, 0, Math.PI * 2);
        context.stroke();
        context.restore();
    }

    function draw(timestamp) {
        const elapsed = (timestamp - startTime) / 1000;
        const assembleProgress = Math.min(elapsed / 2.8, 1);
        const center = getCenter();

        const driftX = Math.cos(elapsed * 0.13) * 8;
        const driftY = Math.sin(elapsed * 0.14) * 8;
        const wobble = 1 + Math.sin(elapsed * 0.35) * 0.008;
        const cloudAlpha = Math.max(assembleProgress * 0.92 + Math.sin(elapsed * 1.2) * 0.03, 0.25);

        context.clearRect(0, 0, width, height);

        context.save();
        context.translate(driftX, driftY);
        context.scale(wobble, wobble);

        drawCloud(center, cloudAlpha);

        const positions = nodes.map((node, index) => {
            const orbit = orbitSeed[index];
            const orbitAngle = elapsed * 0.45 + orbit.angle;
            const orbitX = center.x + Math.cos(orbitAngle) * orbit.distance;
            const orbitY = center.y + Math.sin(orbitAngle) * orbit.distance * 0.68;
            const targetX = center.x + node.x;
            const targetY = center.y + node.y;
            const eased = 1 - Math.pow(1 - assembleProgress, 4);
            const pulse = 1 + Math.sin(elapsed * 2.3 + index * 0.72) * 0.08;

            return {
                x: orbitX + (targetX - orbitX) * eased,
                y: orbitY + (targetY - orbitY) * eased,
                radius: node.radius * (0.95 + 0.08 * (assembleProgress * 0.9)) * pulse,
                glow: 0.45 + Math.sin(elapsed * 2 + node.phase) * 0.2
            };
        });

        links.forEach(([fromIndex, toIndex], lineIndex) => {
            const from = positions[fromIndex];
            const to = positions[toIndex];
            const lineStart = Math.max(0, assembleProgress * 1.35 - lineIndex * 0.09);
            const lineProgress = Math.min(Math.max(lineStart, 0), 1);

            if (lineProgress <= 0) return;

            const currentX = from.x + (to.x - from.x) * lineProgress;
            const currentY = from.y + (to.y - from.y) * lineProgress;

            context.save();
            context.globalAlpha = 0.18 + lineProgress * 0.52;
            context.strokeStyle = '#FFFFFF';
            context.lineWidth = 1.8 + lineProgress * 0.8;
            context.beginPath();
            context.moveTo(from.x, from.y);
            context.lineTo(currentX, currentY);
            context.stroke();
            context.restore();
        });

        positions.forEach((node) => {
            context.save();
            context.fillStyle = '#ffffff';
            context.shadowBlur = 16 + (node.glow * 6);
            context.shadowColor = `rgba(255,255,255,${0.28 + node.glow * 0.28})`;
            context.beginPath();
            context.arc(node.x, node.y, node.radius, 0, Math.PI * 2);
            context.fill();

            context.lineWidth = 2.5;
            context.strokeStyle = 'rgba(255,255,255,0.25)';
            context.stroke();
            context.restore();

            if (Math.random() < 0.008) {
                context.save();
                context.fillStyle = 'rgba(255,255,255,0.75)';
                context.beginPath();
                context.arc(node.x + (Math.random() - 0.5) * 16, node.y + (Math.random() - 0.5) * 16, 1.5, 0, Math.PI * 2);
                context.fill();
                context.restore();
            }
        });

        context.restore();

        animationFrame = window.requestAnimationFrame(draw);
    }

    resizeCanvas();
    animationFrame = window.requestAnimationFrame(draw);
    window.addEventListener('resize', resizeCanvas);

    document.addEventListener('visibilitychange', () => {
        if (document.hidden) {
            window.cancelAnimationFrame(animationFrame);
            animationFrame = null;
            return;
        }

        startTime = performance.now();
        if (!animationFrame) {
            animationFrame = window.requestAnimationFrame(draw);
        }
    });
})();
