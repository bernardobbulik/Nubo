(function () {
    const addMemberButton = document.getElementById('btnAddMember');
    const saveMemberButton = document.getElementById('btnSaveMember');
    const memberForm = document.getElementById('memberForm');
    const memberModalElement = document.getElementById('memberModal');

    if (!addMemberButton || !memberModalElement) return;

    const memberModal = bootstrap.Modal.getOrCreateInstance(memberModalElement);

    addMemberButton.addEventListener('click', () => {
        window.NuboUI.setButtonLoading(addMemberButton, true);

        setTimeout(() => {
            window.NuboUI.setButtonLoading(addMemberButton, false);
            memberModal.show();
        }, 380);
    });

    memberForm.addEventListener('submit', (event) => {
        event.preventDefault();
        window.NuboUI.setButtonLoading(saveMemberButton, true);

        setTimeout(() => {
            window.NuboUI.setButtonLoading(saveMemberButton, false);
            memberModal.hide();
            memberForm.reset();
            window.NuboUI.showToast('successToast');
        }, 1100);
    });

    window.NuboUI.bindModalShortcuts('#memberModal', () => saveMemberButton);
})();
